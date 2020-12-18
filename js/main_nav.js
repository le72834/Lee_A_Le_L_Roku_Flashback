(() => {
    let hamburger = document.querySelector('.hamburger'),
        mainNav = document.querySelector('.main-nav'),
        hamNavCon = document.querySelector('.hamburger-nav-con');
        

        mainNav.classList.add("scroll-menu");
        hamburger.classList.add("hamburger-scroll-menu");
        

        function hamburgerMenu() {
            mainNav.classList.toggle('slide-toggle');
            hamNavCon.classList.toggle('slide-toggle');
            
        }


        //code hambuger nav from https://codepen.io/alisonhall/pres/GJVEpO
        var toggles = document.querySelectorAll('.hamburger-con');
        for (var i = toggles.length - 1; i >= 0; i--) {
            var toggle = toggles[i];
            toggleHandler(toggle);
          };
        
          function toggleHandler(toggle) {
            toggle.addEventListener( "click", function(e) {
              e.preventDefault();
              (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
            });
          }
          
        



    hamburger.addEventListener('click', hamburgerMenu);
})();