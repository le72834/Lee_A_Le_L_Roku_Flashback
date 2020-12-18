export default {
    name: "ButtonComponent",

    template: `
        <div class="button-wrapper">
        <button @click="loadMediaComponent" data-mediatype="TVShows">TV Shows</button>
        <button @click="loadMediaComponent" data-mediatype="GameShow">GameShow</button>
        <button @click="loadMediaComponent" data-mediatype="Movies">Movies</button>
        
        
        </div>
    `,
    methods: {
        loadMediaComponent(event) {
            this.$emit("setmediatype", event.target.dataset.mediatype);
        }
    }
}