<?php

namespace App\Http\Controllers; // its controller in this path - laravel can find it base on just name

use App\Models\User; // read write data to DB users
use Illuminate\Http\Request;    // this class is used to get data from request (get, post)
use Illuminate\Support\Facades\Auth;    // this class is used to authenticate user (login, logout) - Laravel's gate
use App\Models\CartItem;


class AuthController extends Controller
{
    // 1 show login form
    public function showLoginForm()
    {
        return view('auth.login-page');
    }

    // 2 process POST /login - user submits login form
    public function login(Request $request)
    {
        $credentials = $request->validate([     // method which validates data from request
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt to log the user in
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            // ak je to admin, presmeruj na admin dashboard
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            }

            // bezny pouzivatel - hlavna stranka
            return redirect()->intended('/');
        }

        return back()   // abbreviation for redirect()->back()
            ->withErrors(['email' => 'Neplatné prihlasovacie údaje.'])
            ->onlyInput('email');
    }

    // 3 logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();  // delete whole actual session - laravel knows from now that no user is not logged in
        $request->session()->regenerateToken(); // regenerate CSRF token - every form has its own token which is compared with the one in session

        return redirect('/');   // redirect to home page
    }

    // 4 show register form
    public function showRegistrationForm()
    {
        return view('auth.register-page');
    }

    // 5 process post/ register
    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name'  => ['required', 'string', 'max:20'],
            'last_name'   => ['required', 'string', 'max:20'],
            'email'       => ['required', 'email', 'unique:users,email'],
            'password'    => ['required', 'confirmed', 'min:6'],
            'address'     => ['required','string'],
            'city'        => ['required','string'],
            'postal_code' => ['required','string'],
            'country'     => ['required','string'],
        ]);

        //  Vytvorenie usera
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => $data['password'], // automaticky sa heslo hashne cez cast v modeli
        ]);

        //  Uloženie adresy
        $user->address()->create([
            'street'      => $data['address'],
            'city'        => $data['city'],
            'postal_code' => $data['postal_code'],
            'country'     => $data['country'],
        ]);

        //  Prihlásenie nového užívateľa
        Auth::login($user);

        //  Migruj session‐ový košík do DB pre nového usera
        $sessionCart = $request->session()->get('cart', []);

        foreach ($sessionCart as $item) {
            $productId = $item['id'];
            $size      = $item['size'] ?? null;
            $quantity  = $item['quantity'];

            // Ak už existuje rovnaký záznam, pripočítame množstvo
            $existing = CartItem::where('user_id',    $user->id)
                ->where('product_id', $productId)
                ->where('size',       $size)
                ->first();

            if ($existing) {
                $existing->quantity += $quantity;
                $existing->save();
            } else {
                CartItem::create([
                    'user_id'    => $user->id,
                    'product_id' => $productId,
                    'size'       => $size,
                    'quantity'   => $quantity,
                ]);
            }
        }

        //  Vymažeme session‐ový košík
        $request->session()->forget('cart');

        //  Redirekt na homepage alebo kamkoľvek chceš
        return redirect('/');
    }


    // 6 go to profile page
    public function profile()
    {
        return view('auth.profile', [
            'user' => Auth::user(),     // send this user (object) to view
        ]);
    }




    // ***************** Updating profile *****************
    public function updateProfile(Request $request)
    {
        // 1 validate data from requesst
        $data = $request->validate([
            'email'       => ['required','email','unique:users,email,' . auth()->id()],
            'first_name'  => ['required','string','max:50'],
            'last_name'   => ['required','string','max:50'],
            'address'     => ['required','string'],
            'city'        => ['required','string'],
            'country'     => ['required','string'],
            'postal_code' => ['required','string'],
        ]);

        // 2 update user
        $user = auth()->user();
        $user->update($data);

        // 3 update address
        $user->address()->updateOrCreate([], [
            'street'      => $data['address'],
            'city'        => $data['city'],
            'country'     => $data['country'],
            'postal_code' => $data['postal_code'],
        ]);

        // 4 ugo back with flash message
        return back()->with('status', 'Údaje boli uložené.');
    }

}


