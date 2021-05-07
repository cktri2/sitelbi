<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Julien Gabrielli</title>
</head>
<body>
    <style>
        body {
            background: url('site.jpg') no-repeat, 50% 50%;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        h1 {
            text-transform: uppercase;
            font-size: 60px;
            font-weight: 700;
            font-family: sans-serif;
            color: #fff;
        }
        .btn {
            position: absolute;
            top: 0;
            left: 0;
            width:10px;
            height: 10px;
            display: none;
        }
        @media screen and (max-width: 1080px) {
            .btn {
                display: block;
            }
        }
    </style>
    
<h1 class="titreClicekd">Site en construction</h1>
<span class="btn" onclick="clicked();"></span>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    let compteur = 0;
    let char = []
    let test = [70,69,82,82,65,71,69]
    $('body').on('keyup', function(event) {
        char.push(event.keyCode);
        for(let i = 0; i < char.length; i++) {
            if(test[i] === char[i]) {
                if(test.length == char.length && compteur == 0) {
                    compteur = compteur + 1
                    clicked();
                }
            } else {
                char = []
            }
        }
    })

    function clicked() {
        $('.titreClicekd').on('click', function() {
            var username = getCookie("username");
            username = prompt("Mot de passe:", "");
            if (username != "" && username != null) {
            setCookie("username", username, 365);
            location.reload();
            }
        })
    }
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>  
</body>
</html>

