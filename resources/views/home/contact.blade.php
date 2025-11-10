@extends('layouts.show')
@section('title','contact')
@section('content')
<body class="contact-body">
    <div class="contact">

        <div>
            <h1 class="Contact-h11" >Contact Page</h1>
        </div>

        <div class="coordoner">
            <div class="adress">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 24" fill="currentColor"><path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13Z"></path></svg>
                    <h3>Adress</h3></div>
                <div>
                    <p>3891 Ranchview Dr. Richardson, Californie 62639</p>
                </div>
            </div>

            <div class="adress">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 24" fill="currentColor"><path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path></svg>
                    <h3>phone number</h3>
                </div>
                <div>
                    <p>(603) 555-0123</p>
                </div>
            </div>

            <div class="adress">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 24" fill="currentColor"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z"></path></svg>
                    <h3>Email</h3>
                </div>
                <div>
                    <p> lifecoach@mail.com </p>
                </div>
            </div>
        </div>

        <div class="message">
            <div class="form message_child">
                <h3>contactez nous</h3>
                <form action="">
                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input type="text" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Your mail</label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div class="form-group">
                        <label for="objet">Objet</label>
                        <input type="text" name="objet" id="objet">
                    </div>

                    <div class="form-group">
                        <label for="message">Your message</label>
                        <textarea name="message" id="message"></textarea>
                    </div>

                    <button name="valider">Envoyer</button>
                </form>

            </div>

            <div class="map message_child">

                <h3> nous sommes ici</h3>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.8248585278197!2d9.742915374070186!3d4.056110146910159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610d9f57e93471%3A0x3b731da84fc81386!2sInstitut%20Universitaire%20De%20Technologies%20De%20Douala!5e0!3m2!1sfr!2scm!4v1760774470503!5m2!1sfr!2scm" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>

    </div>
</body>
@endsection
