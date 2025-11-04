function scrollToSection(event, sectionId) {
  event.preventDefault();
  const section = document.getElementById(sectionId);
  if(section){ 
    section.scrollIntoView({ behavior: 'smooth' });
    window.history.pushState(null, null, window.location.pathname);
  } 
}

const swipertestim = new Swiper('#swiper-testimonials', {
  slidesPerView: 1.5,
  spaceBetween: 20,
  speed: 8000,    
  loop: true,
  allowTouchMove:false,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  breakpoints: {
    480: {
      slidesPerView: 1.5,
      spaceBetween: 20,
      speed: 8000,
    },
    768: {
      slidesPerView: 2.5,
      spaceBetween: 40,
      speed: 8000,
    },
    1024: {
      slidesPerView: 4.5,
      spaceBetween: 40,
      speed: 8000,
    },
  }
});

document.addEventListener("DOMContentLoaded",function(){

  if(window.innerWidth<767){
    var map = L.map('map',{
      zoomControl: true,
      scrollWheelZoom: true,
      doubleClickZoom: true,
      touchZoom:true
    }).setView([23.6345,-102.5528],3);
  } else {
    var map = L.map('map',{
      zoomControl: false,
      scrollWheelZoom: false,
      doubleClickZoom: false,
      touchZoom:false
    }).setView([23.6345, -102.5528], 5);
  }

   // Agregar capa de mapa base (puedes cambiar la URL si prefieres otro estilo de mapa)
   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  // Crear un nuevo icono de Leaflet para los marcadores rojos
  var redMarkerIcon = L.icon({
    iconUrl: 'data:image/svg+xml;charset=utf-8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"%3E%3Cpath fill="%23f23322" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/%3E%3C/svg%3E',
    iconSize: [32, 32], // Tamaño del icono
    iconAnchor: [16, 32], // Punto de anclaje del icono
  });

  // Crear los marcadores para las ciudades
  var markerCdmx = L.marker([19.4326, -99.1332],{icon:redMarkerIcon}).addTo(map);
  var markerQro = L.marker([20.5888, -100.3899],{icon:redMarkerIcon}).addTo(map);
  var markerNvoLeon = L.marker([25.6866, -100.3161],{icon:redMarkerIcon}).addTo(map);
  var markerJal = L.marker([20.6597, -103.3496],{icon:redMarkerIcon}).addTo(map);
  var markerYuc = L.marker([20.8749, -89.1769],{icon:redMarkerIcon}).addTo(map);
  

  // Asociar los modales a cada marcador usando eventos de clic
  markerCdmx.on('click', function() {
    var modalCdmx = new bootstrap.Modal(document.getElementById('modalCdmx'));
    modalCdmx.show();
  });

  markerQro.on('click', function() {
    var modalQro = new bootstrap.Modal(document.getElementById('modalQro'));
    modalQro.show();
  });

  markerNvoLeon.on('click', function() {
    var modalNvoLeon = new bootstrap.Modal(document.getElementById('modalNvoleon'));
    modalNvoLeon.show();
  });

  markerJal.on('click', function() {
    var modalJalisco = new bootstrap.Modal(document.getElementById('modalJal'));
    modalJalisco.show();
  });

  markerYuc.on('click', function() {
    var modalYuc = new bootstrap.Modal(document.getElementById('modalYuc'));
    modalYuc.show();
  });
});

document.addEventListener('DOMContentLoaded', function(){
  const initSwiper=(swiperElement)=>{
    const progressCircle=swiperElement.querySelector('svg');
    const progressContent = swiperElement.querySelector('span');

    return new Swiper(swiperElement, {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      effect: 'flip',
      slidesPerView: 'auto',
      flipEffect: {
        rotate: 30,
        slideShadows: false,
      },
      on: {
        autoplayTimeLeft(s,time,progress){
          progressCircle.style.setProperty('--progress', 1 - progress);
          progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        },
      },
    });
  };
  const swiperInstances = {};
  // Selecciona todos los carouseles de los modals
  document.querySelectorAll('.carousel').forEach((carouselElement)=>{
    //Detectar cuando se muestre el modal

    carouselElement.closest('.modal').addEventListener('shown.bs.modal',function(){
      const swiperGalleries = carouselElement.querySelectorAll('.swiper-gallery');

      swiperGalleries.forEach((swiperElement, index) => {
        swiperInstances[swiperElement.id]=initSwiper(swiperElement);
      });
    });

    
    carouselElement.addEventListener('slid.bs.carousel', function(e){
      const activeIndex = e.to;
      const swiperGalleries = carouselElement.querySelectorAll('.swiper-gallery');

      swiperGalleries.forEach((swiperElement, index) =>{
        if(swiperInstances[swiperElement.id]){
          swiperInstances[swiperElement.id].destroy(true,true); // Destruye el Swiper si ya existe
        }
        if(index === activeIndex){
          swiperInstances[swiperElement.id]=initSwiper(swiperElement); // Inicializa el Swiper solo para el proyecto activo
        }
      });
    });
  });
});

$(document).ready(function() {
  $('#contactForm').on('submit', function(e) {
      e.preventDefault(); // Evita que el formulario se envíe de manera tradicional

      var formData = $(this).serialize(); // Serializa los datos del formulario

      $.ajax({
          url: $(this).attr('action'), // Usa la URL del atributo action del formulario
          type: 'POST',
          data: formData,
          dataType: 'json', // Espera una respuesta en formato JSON
          success: function(response) {
              // Limpiar el mensaje anterior
              $('#formMessage').html('');

              if (response.status === 'success') {
                  $('#formMessage').html('<div class="alert alert-success">' + response.message + '</div>');
              } else {
                  $('#formMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
              }

              // Limpiar el formulario después de un envío exitoso (opcional)
              if (response.status === 'success') {
                  $('#contactForm')[0].reset(); // Reinicia el formulario
              }
          },
          error: function(xhr, status, error) {
              $('#formMessage').html('<div class="alert alert-danger">Hubo un error al enviar el mensaje. Inténtalo de nuevo más tarde.</div>');
          }
      });
  });
});