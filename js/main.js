import TVShowsComponent from "./components/TheTVShowsComponent.js";
import MoviesComponent from "./components/TheMoviesComponent.js";
import GameShowComponent from "./components/TheGameShowComponent.js";
import ButtonComponent from "./components/TheButtonComponent.js";
import {fetchData } from"./components/DataMiner.js";
(()=> {
    const myVM = new Vue({
        data: {
            activeComponent: TVShowsComponent,
            items: [],
            currentData:{}
        },
        mounted: function() {
            console.log("vue is mounted, trying a fetch for the initial data");
            fetchData("./includes/index.php")
            .then(data => { 
                    
                data.forEach(item =>this.items.push(item));
                
                
            })
                .catch(err => console.error(err));
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