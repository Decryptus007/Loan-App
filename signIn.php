<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
    <title>SunPaid</title>
</head>

<body>
    <div class="loginUI">
        <section class="headTitle">
            <h1>SunPaid Loan App</h1>
            <p>Online loan, as fast as 5 minutes</p>
        </section>
        <main>
            <h2>Log In</h2>
            <form onsubmit="() => alert('Hi')">
                <label><span>Email:</span><input type="email" placeholder="Input your Email" /></label>
                <label><span>Password:</span><input type="password" placeholder="Input your Password" /></label>
                <a href="./home.php"><button type="button">LOG IN</button></a>
            </form>
            <p class="signUp">Don't have an account? Create <a href="./signUp.php"
                    class="signUpLink">account</a></p>
        </main>
    </div>
</body>

</html>