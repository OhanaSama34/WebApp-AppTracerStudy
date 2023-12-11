<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page - AppTracerStudy</title>
    <link rel="icon" href="<?= base_url('bootstrap/') ?>assets/img/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="link-ke-css-bootstrap.css">

    <!--link css-->
    <link rel="stylesheet" href="<?= base_url('landing-page/') ?>css/style.css"/>
    <link rel="stylesheet" href="<?= base_url('landing-page/') ?>css/responsive.css"/>

    <!--Font Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
  </head>
  
  <body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark position-fixed w-100">
      <div class="container">
        <img class="icon-footer" href="#hero" src="<?= base_url('landing-page/') ?>assets/img/education_grad_cap_in_cartoon_style_(1)_(1)-transformed.png">
        <a class="navbar-brand" href="#hero">TRACER STUDY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ms-auto d-flex gap-4">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#hero">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#faq">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">CONTACT</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?= site_url('auth') ?>">LOGIN</a>
            </li>
          </ul>
          
        </div>
        <div>
        
        </div>
      </div>
    </nav>
<!--
    <nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <img class="icon-footer" href="#hero" src="assets/img/education_grad_cap_in_cartoon_style_(1)_(1)-transformed.png">
        <a class="navbar-brand" href="#hero">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#hero">HOME</a>
            <a class="nav-link" href="#faq">FAQ</a>
            <a class="nav-link" href="#contact">CONTACT</a>
            <button class="button-secundary">LOGIN</button>
          </div>
        </div>
      </div>
    </nav>-->
  
    <!--Hero Section-->
    <section id="hero">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-md-6 col-lg-6 hero-tagline ms-auto my-auto">
            <h1 class="mb-3">SISTEM INFORMASI <span>TRACER STUDY</span></h1>
              <p><span>"Discover Your Path to Success with Tracer Study"</span> <br>Kami mengundang Anda untuk menjadi bagian dari komunitas alumni yang saling mendukung.</p>
                
          </div>
        </div>
        <img src="<?= base_url('landing-page/') ?>assets/img/8700_4_08-removebg-preview.png" alt="" class="col-md-6 position-absolute top-0 img-hero">
      </div> 
    </section>

    <!--About Section-->
    <section>
      <div class="container-fluid about ">
        <div class="row ">
          <div class="col-md-6 text-center trace animated-fade align-items-center my-auto" id="traceElement"> 
            <h2 class="">Apa itu <span class="">Tracer Study</span> ?</h2>
            <p>Tracer Study adalah salah satu metode untuk melacak dan mendapatkan umpan balik (feedback) dari alumni sebuah institusi pendidikan, terutama perguruan tinggi di Indonesia. Hasil dari program Tracer Study ini umumnya digunakan oleh perguruan tinggi untuk meningkatkan kualitas sistem pendidikannya.<br><br>

              Selain itu, hasil umpan balik dari Tracer Study juga sangat berguna bagi perguruan tinggi dalam memperoleh gambaran dunia usaha dan industri. Dengan demikian, perguruan tinggi dapat mengetahui jarak kompetensi yang dimiliki alumni mereka dengan keterampilan yang dibutuhkan di pasar tenaga kerja untuk kemudian memperkecilnya.</p>
          </div>
          
        </div>
        <img src="<?= base_url('landing-page/') ?>assets/img/4966089_50577-removebg-preview.png" alt="" class="position-absolute align-items-center end-0 top-100 about mage img-trace animated-fade">
      </div>
    </section>

    <section class="benefits-section ms-5 me-5">
      <h2 class="ms-4 ben text-center benefi">Manfaat dari <span class="">Tracer Study</span> </h2>
      <div class="benefits-container">
          <div class="benefit animated-fade">
              <div class="benefit-icon order-1">
                  <img src="<?= base_url('landing-page/') ?>assets/img/3-removebg-preview (2).png" alt="Manfaat 1">
              </div>
              <h3>Memandu Pendidikan Lanjutan</h3>
              <p>Hasil tracer study dapat membantu calon mahasiswa dalam memilih program pendidikan lanjutan yang sesuai dengan mengidentifikasi program yang relevan berdasarkan pengalaman alumni.</p>
          </div>
  
          <div class="benefit animated-fade">
              <div class="benefit-icon order-1">
                  <img src="<?= base_url('landing-page/') ?>assets/img/2-removebg-preview (2).png" alt="Manfaat 2">
              </div>
              <h3>Meningkatkan Kualitas Pendidikan</h3>
              <p>Hasil tracer study dapat digunakan untuk mengidentifikasi kekuatan dan kelemahan dari program-program pendidikan, dan dengan demikian dapat meningkatkan kualitas pendidikan.</p>
          </div>
  
          <div class="benefit animated-fade">
              <div class="benefit-icon order-1">
                  <img src="<?= base_url('landing-page/') ?>assets/img/1-removebg-preview (2).png" alt="Manfaat 3">
              </div>
              <h3>Menyediakan Informasi Karir</h3>
              <p>Tracer study memberikan informasi berharga kepada lulusan mengenai karir mereka. Mereka dapat melihat tren penempatan karir, peluang pekerjaan, dan gaji dalam bidang yang sesuai dengan gelar mereka.</p>
          </div>
      </div>
  </section>
  
  

   
    <!-- FAQ Section -->
    <section id="faq" class="py-5">
      <div class="container">
          <h2 class="faq-heading">Frequently Asked <span>Questions</span></h2>
          <div class="accordion" id="faqAccordion">
              <!-- FAQ Item 1 -->
              <div class="accordion-item">
                  <h2 class="accordion-header" id="faqHeading1">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false">
                        Berapa lama waktu yang dibutuhkan untuk mengisi kuesioner Tracer Study?
                      </button>
                  </h2>
                  <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        Waktu yang dibutuhkan untuk mengisi kuesioner Tracer Study bervariasi, tetapi umumnya memakan waktu sekitar 15-20 menit.
                      </div>
                  </div>
               </div>

              <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false">
                        Apakah Tracer Study ini berbayar?
                        </button>
                    </h2>
                    <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        Tidak, Tracer Study ini adalah program penelitian yang diselenggarakan oleh kami dan tidak memerlukan biaya apapun dari responden.
                      </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                  <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false">
                      Apa manfaat bagi saya sebagai responden dalam Tracer Study ini?
                      </button>
                  </h2>
                  <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                      Manfaatnya adalah Anda akan berkontribusi pada penelitian yang penting untuk perbaikan pendidikan dan pengembangan karier mahasiswa di Indonesia. Selain itu, Anda akan mendapatkan wawasan tentang apa yang bisa diharapkan setelah lulus kuliah.
                    </div>
                  </div>
              </div>
         </div>
      </div>
  </section>

    <!--kontak Section-->
    <section id="contact">
      <div class="container-fluid overlay">
        <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3> Ada pertanyaan? Hubungi Kami....</h3>
            <div class="kontak">
              <div class="icon-kontak mb-3">
                <img  class="contact-info me-2" src="<?= base_url('landing-page/') ?>assets/img/b-removebg-preview.png" alt="">
                <p>Location:<br><a href="#">Jawa Tengah 50229 Kota Semarang</a></p>
              </div>

              <div class="icon-kontak mb-3">
                <img class="contact-info me-2" src="<?= base_url('landing-page/') ?>assets/img/d-removebg-preview.png" alt="">
                <p>Email:<br><a href="#">ghozaliiskandar3@gmail.com</a></p>
                </div>

              <div class="icon-kontak mb-3">
                <img class="contact-info me-2" src="<?= base_url('landing-page/') ?>assets/img/c-removebg-preview.png" alt="">
                <p>Telp:<br><a href="#">+62 821-3005-2329</a></p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-contact w-100">
              <form>
                <h2>Tanya Apa...?</h2>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label class="d-flex align-items-center" for="floatingInput">Masukin Email-mu...</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label class="d-flex align-items-center" for="floatingInput">Tulis Pertanyaanmu di sini...</label>
                </div>
                <button type="submit" class="button-kontak">Kirim</button>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>


    <footer class="d-flex align-items-center position-relative">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-5 position-absolute start-50 translate-middle d-flex justify-content-evenly align-items-center text-center gap-1">
              <a href="#hero">HOME</a>
              <a href="#faq">FAQ</a>
              <a href="#contact">CONTACT</a>
            </div>
            <div class="row position-absolute copyright start-50 translate-middle text-center">
              <div class="col-12 ">
                <p>Copyright by Tracer Study All Right Reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <script src="js/apa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    
  </body>

</html>