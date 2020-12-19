(()=>{
    document.querySelector(".fa").addEventListener("click", function(event){
        toggleLike(event);
    });
    function toggleLike(ele) {
        ele.target.classList.toggle("fa-thumbs-down");
    }

})();