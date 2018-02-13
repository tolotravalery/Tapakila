<!DOCTYPE html>
<html lang="fr">
<head>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
        }
        }

        #globcontent {
            background-color: white;
            margin-top: 84px;
            padding: 20px 30px 20px 30px;
            overflow: hidden;
            margin-bottom: 83px;
            border-radius: 3px;
        }

        .mim {
            border-bottom: 1px solid black;
            padding-bottom: 2px;
        }
        #textmotdepass
        {
            position: relative;
            margin: auto;
            text-align: center;
            text-decoration:none;
            color:white;
            top:10px;
            font-size:16px;
            padding-left:40px;

        }
        .button {
            background-color:black; /* Green */
            border: none;
            color: white;
            padding: 5px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius:5px;
            position: relative;
            margin: auto;
        }
        .reinitalise{
            position: relative;
            margin: auto;
            width: auto;
            background:green;
        }
    </style>

</head>
<body>
<div id="cp">
    <div id="header" style="width:100%;height:100px;background:#d70506;color:white;">
        <img src="{{url('/')}}/public/img/logo.png" style="padding-left: -5px;">
        <div id="textheader" style="position:relative; width:400px; margin:auto;  font-size:18px; padding-top:40px;text-align: center; text-decoration:none;color:white;"><a style="text-decoration:underline;color:white;" href="https://leguichet.mg/faq">www.leguichet.mg</a></div>
    </div>

    <div id="section" style="width:100%;height:400px;background:white;">
        <div id="message" style="position:relative;margin:auto;width:100%;height:40px;top:5px;"> <p style=" text-align:center; color:white;font-size:30px;font-style:bold; padding-top:3px;"> Mot de passe oublié </p></div>
        <div id="section-text" style="position:relative;padding-left:50px;padding-right:50px">


            <div id="row1" style="padding-top:30px;">

                <p> Vous avez demandé à changer le mot de passe de votre compte leguichet ? Pour créer un nouveau mot de passe cliquez sur le lien ci-dessous :</p>


            </div></br>

            <div id="row2" style="padding-top:10px; width:500px;height:auto;">

                <a classe="reinitalise" style="position: absolute;width: 400px;margin: auto;" href="#"> <button class="button">Réinitialiser votre mot de passe</button></a>



            </div></br>



        </div>


    </div>

    <div id="footer" style="width:100%;height:100px;background:#d70506;top:500px;">

        <div id="textfooter" style="position:relative; width:400px; margin:auto; color:white; font-size:14px; padding-top:40px;text-align: center;">Pour toutes questions, consultez <a style="text-decoration:underline;color:white;" href="https://leguichet.mg/faq">faq</a></div>
    </div>

</div>
</body>