<!-- Sección Proyectos -->
<section id="proyectos" class="py-3 py-md-5 py-xl-8">
    <div class="container text-center">
        <h2 class="h2" id="h2proyectos">Nuestros proyectos</h2>
        <div class="d-flex justify-content-center m-5">
            <div id="map">
            </div>
        </div>           
    </div>

    <?php
    $proyectos = [
        'Cdmx' => [
            ['city' => 'CDMX', 'title' => 'Proyecto 1 en CDMX', 'category' => 'Corporativo', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.','images' => ['cdmx/proyecto1/proyecto1.jpg','cdmx/proyecto1/proyecto2.jpg']],
            ['city' => 'CDMX', 'title' => 'Proyecto 2 en CDMX', 'category' => 'Público', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['cdmx/proyecto2/proyecto2.jpg','cdmx/proyecto2/proyecto1.jpg']],
        ],
        'Jal' => [
            ['city' => 'Jalisco', 'title' => 'Proyecto 1 en Jalisco', 'category' => 'Privado', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['jalisco/proyecto1/proyecto1.jpg','jalisco/proyecto1/proyecto2.jpg']],
            ['city' => 'Jalisco', 'title' => 'Proyecto 2 en Jalisco', 'category' => 'Público', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['jalisco/proyecto2/proyecto2.jpg','jalisco/proyecto2/proyecto1.jpg']],
        ],
        'Nvoleon' => [
            ['city' => 'Nuevo León', 'title' => 'Proyecto 1 en Nuevo León', 'category' => 'Corporativo', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['nuevoleon/proyecto1/proyecto1.jpg','nuevoleon/proyecto1/proyecto2.jpg']],
            ['city' => 'Nuevo León', 'title' => 'Proyecto 2 en Nuevo León', 'category' => 'Privado', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['nuevoleon/proyecto2/proyecto2.jpg','nuevoleon/proyecto2/proyecto1.jpg']],
        ],
        'Qro' => [
            ['city' => 'Querétaro', 'title' => 'Proyecto 1 en Querétaro', 'category' => 'Corporativo', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['queretaro/proyecto1/proyecto1.jpg','queretaro/proyecto1/proyecto2.jpg']],
            ['city' => 'Querétaro', 'title' => 'Proyecto 2 en Querétaro', 'category' => 'Público', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['queretaro/proyecto2/proyecto2.jpg','queretaro/proyecto2/proyecto1.jpg']],
        ],
        'Yuc' => [
            ['city' => 'Yucatán', 'title' => 'Proyecto 1 en Yucatán', 'category' => 'Corporativo', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['yucatan/proyecto1/proyecto1.jpg','yucatan/proyecto1/proyecto2.jpg']],
            ['city' => 'Yucatán', 'title' => 'Proyecto 2 en Yucatán', 'category' => 'Público', 'date' => '2023', 'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'images' => ['yucatan/proyecto2/proyecto2.jpg','yucatan/proyecto2/proyecto1.jpg']],
        ]
    ];

    foreach($proyectos as $ciudad => $proyectosCiudad){
    ?>
    <!-- Modal <?php echo $ciudad; ?> -->
    <div class="modal fade" id="modal<?php echo $ciudad; ?>" tabindex="-1" aria-labelledby="modal<?php echo $ciudad; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title col-11" id="modal<?php echo $ciudad; ?>Label">Proyectos en <?php echo $proyectosCiudad[0]['city']; ?></h3>
                    <button type="button" class="btn-close col-1" data-bs-dismiss="modal" aria-label="Close"></button>
                    <button></button>
                </div>
                <div class="modal-body">
                    <div id="carouselProyectos<?php echo $ciudad; ?>" class="carousel slide carousel-fade" data-bs-ride="false">
                        <div class="carousel-inner">
                            <?php foreach ($proyectosCiudad as $index => $proyecto) { ?>
                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <div class="card">
                                        <div class="swiper swiper-gallery" id="swiper-<?php echo $index; ?>">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($proyecto['images'] as $image) { ?>
                                                <div class="swiper-slide">
                                                    <img src="assets/img/<?php echo $image; ?>" class="img-fluid" loading="lazy">
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="autoplay-progress">
                                                    <svg viewBox="0 0 48 48">
                                                    <circle cx="24" cy="24" r="20"></circle>
                                                    </svg>
                                                    <span></span>
                                            </div> 
                                        </div>
                                        <div class="info">
                                            <h4 class="title"><?php echo $proyecto['title']; ?></h4>
                                            <p class="description">
                                                <strong>Categoría:</strong> <?php echo $proyecto['category']; ?><br>
                                                <strong>Fecha:</strong> <?php echo $proyecto['date']; ?><br>
                                                <?php echo $proyecto['info']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" id="carouselproyectos-prev" type="button" data-bs-target="#carouselProyectos<?php echo $ciudad; ?>" data-bs-slide="prev">
                            <i class="bi bi-arrow-left-circle-fill"></i>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" id="carouselproyectos-next" type="button" data-bs-target="#carouselProyectos<?php echo $ciudad; ?>" data-bs-slide="next">
                            <i class="bi bi-arrow-right-circle-fill"></i>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>




