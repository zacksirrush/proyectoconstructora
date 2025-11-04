<section id="contacto" class="contacto py-5 text-center" style="background-image: url('assets/img/Proyecto1.jpg'); background-size: cover; background-position: center;">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mb-1 mt-5">
                <div class="contact-info text-white">
                    <h2 class="mb-4">CONTÁCTANOS</h2>
                    <p class="mb-4">
                    ¿Necesitas más información? Ponte en contácto con nosotros. 
                    Escríbenos un correo, llamada,  WhatsApp o visítanos en nuestras oficinas.
                    </p>
                    <div class="mb-4">
                        <i class="fas fa-map-marker-alt"></i> 
                        <strong>Nuestras oficinas</strong>
                        <p>&emsp; &ensp; Blvd Mihail Kogalniceanu,
                        <br>&emsp; &ensp; nr. 8, 7652 CDMX, México</br></p>
                    </div>
                    <div class="mb-4">
                        <i class="fas fa-phone"></i>
                        <strong>Llámanos</strong>
                        <p>&emsp; &ensp; Michael Jordan<br> &emsp; &ensp; +52 762 321 762<br> &emsp; &ensp; Lun - Vie, 8:00-22:00</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card p-4 shadow-lg">
                    <form id="contactForm" action="php/send_mail.php" method="POST">
                        <div class="row mb-3">
                            <div class="col">  
                                <input type="text" id="name" name="name" title="Ingresa tu nombre completo" placeholder="Ingresa tu nombre completo" class="form-control" required> 
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" id="email" name="email" class="form-control" title="Ingresa tu correo electrónico"  placeholder="Ingresa tu correo electrónico" required>  
                        </div>
                        <div class="mb-3">  
                            <textarea type="text" name="message" title="Escribe un mensaje"  placeholder="Cuéntanos más sobre cómo podemos ayudarte" id="message" rows="4" class="form-control md-textarea" required></textarea>   
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ccemail" name="ccemail">
                                    <label class="form-check-label" for="ccemail">Quiero recibir una copia de este correo</label>                    
                                </div>
                            </div>
                        </div>
                        <div class="recaptcha-container">
                            <div class="g-recaptcha mb-4" data-sitekey="6LclwVsqAAAAAHhDMBaRZGyEkrAZ2X7y9xF6nncs"></div> <!-- Reemplaza con tu Site Key -->
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-danger btn-enviar btn-md">Enviar mensaje</button>

                        <div id="formMessage" class="mt-3"></div> <!-- Aquí se mostrará el mensaje -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>