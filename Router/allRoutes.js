import Route from "./Route.js";

export const allRoutes = [
    new Route("/accueil", "/pages/accueil.html", "/js/accueil.js"),
    new Route("/connexion", "/pages/connexion.html", "/js/connexion.js"),
    new Route("/inscription", "/pages/inscription.html"),
    new Route("/services", "/pages/services.html"),
    new Route("/avis", "/pages/avis.html", "/js/avis.js"),
    new Route("/jungle", "/pages/jungle.html" , "/js/jungle.js"),
    new Route("/reptile", "/pages/reptile.html", "/js/reptile.js"),
    new Route("/reserve-africaine", "/pages/reserve-africaine.html", "/js/reserve-africaine.js"),
    new Route("/voliere", "/pages/voliere.html", "/js/voliere.js"),
];

export const websiteName = "ARCADIA ZOO";