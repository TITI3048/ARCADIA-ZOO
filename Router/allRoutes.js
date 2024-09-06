import Route from "./router/Route.js";

export const allRoutes = [
    new Route("/pages", "/pages/accueil.html", "/js/accueil.js"),
    new Route("/pages", "//pages/connexion.html"),
    new Route("/pages", "/pages/inscription.html"),
    new Route("/pages", "/pages/services.html"),
    new Route("/pages", "/pages/avis.html", "/js/avis.js"),
    new Route("/pages", "/pages/jungle.html" , "/js/jungle.js"),
    new Route("/pages", "/pages/reptile.html", "/js/reptile.js"),
    new Route("/pages", "/pages/reserve-africaine.html", "/js/reserve-africaine.js"),
    new Route("/pages", "/pages/voliere.html", "/js/voliere.js"),
];

export const websiteName = "ARCADIA ZOO";