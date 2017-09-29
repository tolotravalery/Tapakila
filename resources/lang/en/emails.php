<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Emails Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for various emails that
    | we need to display to the user. You are free to modify these
    | language lines according to your application's requirements.
    |
    */

    /**
     * Activate new user account email.
     *
     */

    'activationSubject'  => 'Activation required',
    'activationGreeting' => 'Vous y êtes presque',
    'activationMessage'  => 'Nous sommes prêts à activer votre compte. Il nous suffit de vérifier que cet adresse e-mail est bien le votre.',
    'activationMessage2' =>'Après cela, vous pouvez commander , acheter ou ajouter à votre panier vos évènement favoris.',
    'activationButton'   => 'Activer',
    'activationThanks'   => 'Vous avez des question? consultez notre FAQ dès maintenant',

    /**
     * Goobye email.
     *
     */
    'goodbyeSubject'    => 'Sorry to see you go...',
    'goodbyeGreeting'   => 'Hello :username,',
    'goodbyeMessage'    => 'We are very sorry to see you go. We wanted to let you know that your account has been deleted. Thank for the time we shared. You have ' . config('settings.restoreUserCutoff') . ' days to restore your account.',
    'goodbyeButton'     => 'Restore Account',
    'goodbyeThanks'     => 'We hope to see you again!',

];
