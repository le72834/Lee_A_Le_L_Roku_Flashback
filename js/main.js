import TVShowsComponent from "./components/TheTVShowsComponent.js";
import MoviesComponent from "./components/TheMoviesComponent.js";
import GameShowComponent from "./components/TheGameShowComponent.js";
import ButtonComponent from "./components/TheButtonComponent.js";
(()=> {
    const myVM = new Vue({
        data: {
            activeComponent: TVShowsComponent
        },
        methods: {
            switchComponents() {
                this.activeComponent = (this.activeComponent.name === "TVShowsComponent") ? MoviesComponent : GameShowComponent;
            },
            setComponent(component) {
                this.activeComponent = `${component}Component`;
            }
        },
        components: {
            TVShowsComponent,
            MoviesComponent,
            GameShowComponent,
            "buttoncomponent" : ButtonComponent
        } 
    }).$mount("#recommanded");

})();