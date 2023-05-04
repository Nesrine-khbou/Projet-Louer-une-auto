<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <section id="Space"></section>
        <section id="content">
            <section id="content_header">
                <h1 id="logo">Louer Une Auto</h1>
                <h2>connectez-vous à votre compte</h2>
            </section>
            <form action="authentification2.php" method="post">


                <ul class="inline_1">
                    <li>
                        <label for="Email">Email</label>
                        <div>
                            <input type="text" name="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                            </svg>                              
                        </div>
                    </li>
                </ul>
                <ul class="inline_1">
                    <li>
                        <label for="mdp">Mot de passe</label>
                        <div>
                            <input type="text" name="mdp">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>                              
                        </div>
                    </li>
                </ul>

                <section id="agree">
                    <div>
                        <input type="checkbox" name="agree">
                        <label for="agree">Remember me</label>
                    </div>
                    <a href="#">Mot de passe oublié?</a>
                </section>

                <ul id="edit_save">
                    <li>
                        <button name="submit" id="save" type="submit">
                            <p>Log in</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859M12 3v8.25m0 0l-3-3m3 3l3-3" />
                            </svg>                              
                        </button>
                    </li>
                </ul>

                <section id="sign_in">
                    <p>vous n'avez pas de compte ? <a href="sign_up.html">Sign in</a></p>
                </section>
            </form>
        </section>
    </main>

    
</body>
</html>