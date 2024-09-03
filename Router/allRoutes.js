import Route from "./router/Route.js";

export const allRoutes = [
    new Route("/Accueil", "/Accueil/accueil.html", "/Accueil/accueil.js"),
    new Route("/connexion, /Connexion/connexion.html", "/Connexion/connexion.js", "/espace-admin/admin.php"),
    new Route("/Services", "/Services/services.html", "/Services/services.js"),
    new Route("/avis", "/Avis/avis.html", "/Avis/avis.js"),
    new Route("/jungle", "/Jungle/jungle.html", "/Jungle/jungle.js"),
    new Route("/reptile", "/Reptile/reptile.html", "/Reptile/reptile.js"),
    new Route("/reserve africaine", "/ReserveAfricaine/reserveAfricaine.html", "/ReserveAfricaine/reserveAfricaine.js"),
    new Route("/voliere", "/Voliere/voliere.html", "/Voliere/voliere.js"),
];

export const websiteName = "ARCADIA ZOO";