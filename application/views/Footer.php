<!--talvez retire a legenda do slide mas não sei ainda-->

  </div>
<script type="text/javascript">
    function setaImagem() {
        var settings = {
            primeiraImg: function () {
                elemento = document.querySelector("#slider a:first-child");
                elemento.classList.add("ativo");
                this.legenda(elemento);
            },

            slide: function () {
                elemento = document.querySelector(".ativo");

                if (elemento.nextElementSibling) {
                    elemento.nextElementSibling.classList.add("ativo");
                    settings.legenda(elemento.nextElementSibling);
                    elemento.classList.remove("ativo");
                } else {
                    elemento.classList.remove("ativo");
                    settings.primeiraImg();
                }

            },

            proximo: function () {
                clearInterval(intervalo);
                elemento = document.querySelector(".ativo");

                if (elemento.nextElementSibling) {
                    elemento.nextElementSibling.classList.add("ativo");
                    settings.legenda(elemento.nextElementSibling);
                    elemento.classList.remove("ativo");
                } else {
                    elemento.classList.remove("ativo");
                    settings.primeiraImg();
                }
                intervalo = setInterval(settings.slide, 4000);
            },

            anterior: function () {
                clearInterval(intervalo);
                elemento = document.querySelector(".ativo");

                if (elemento.previousElementSibling) {
                    elemento.previousElementSibling.classList.add("ativo");
                    settings.legenda(elemento.previousElementSibling);
                    elemento.classList.remove("ativo");
                } else {
                    elemento.classList.remove("ativo");
                    elemento = document.querySelector("a:last-child");
                    elemento.classList.add("ativo");
                    this.legenda(elemento);
                }
                intervalo = setInterval(settings.slide, 4000);
            },

            legenda: function (obj) {
                var legenda = obj.querySelector("img").getAttribute("alt");
                document.querySelector("figcaption").innerHTML = legenda;
            }

        }

        //chama o slide
        settings.primeiraImg();

        //chama a legenda
        //settings.legenda(elemento);

        //chama o slide à um determinado tempo
        var intervalo = setInterval(settings.slide, 5000);
        document.querySelector(".next").addEventListener("click", settings.proximo, false);
        document.querySelector(".prev").addEventListener("click", settings.anterior, false);
    }

    window.addEventListener("load", setaImagem, false);
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
