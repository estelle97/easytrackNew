<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Easytech Consulting</h2>

    <p> Bonjour Monsieur/Madame {{$company->owner->name}}, <br>
        Bienvenue  sur la plateforme EASYTRACK et Merci de nous avoir fait confiance ! <br>
        Vous trouverez  ci-joint, les informations nécessaires et relatives à votre abonnement telles que: <br>
        Nom utilisateur: <strong> {{$company->owner->username}} </strong> <br>
        Numéro de licence EASYTRACK: <strong> {{$company->types->last()->pivot->licence_number}} </strong> <br>

        <strong> Période de validité: 30 jours à compter de votre date d'abonnement</strong> <br>

        Afin de vérifier l'exactitude de votre transaction de paiement,
        veuillez le confirmer en nous envoyant un message contenant votre
        numéro de paiement ainsi que celui de votre licence EASYTRACK au numéro suivant : +(237) 699 07 15 69 <br>

        Attention, la validation de votre paiement doit se faire 48 heures après la transaction, au risque de voir votre compte désactivé <br>

        N’hésitez pas à communiquer avec nous pour plus de renseignements à l'adresse suivante: arlettecmo@easytecconsulting.com ou au numéro +(237).243 75 70 34/ 699 07 15 69
    </p>
  </body>
</html>
