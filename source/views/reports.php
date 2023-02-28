<?php
require('../header.php');
require('menu.php');
require('nav_bar.php');
?>

<div class="home-content">
  <div class="sales-boxes mx-5">
    <div class="recent-sales box">
      <div class="title text-center">Reportes</div>
      <h6 class="border-bottom pb-2 mb-0 mb-3"></h6>

      <form action="" class="container row">
        <div class="col">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Referencia</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
        </div>

        <div class="col">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Hasta</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Monto</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Fuente</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
          </div>
          <!-- <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div> -->
        </div>

        <div class="button pt-3 row mb-2" id="see_alls">
          <a href="#" class="col-auto me-auto mx-4" id="see_all">Limpiar</a>
          <a href="#" class="col-auto me-2" id="see_all">Grafica</a>
          <a href="#" class="col-auto" id="see_all">Generar</a>
        </div>

      </form>

      <!-- <div class="sales-details">
        <ul class="details">
          <li class="topic">Date</li>
          <li><a href="#">02 Jan 2021</a></li>
          <li><a href="#">02 Jan 2021</a></li>
          <li><a href="#">02 Jan 2021</a></li>
          <li><a href="#">02 Jan 2021</a></li>
          <li><a href="#">02 Jan 2021</a></li>
          <li><a href="#">02 Jan 2021</a></li>
          <li><a href="#">02 Jan 2021</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Customer</li>
          <li><a href="#">Alex Doe</a></li>
          <li><a href="#">David Mart</a></li>
          <li><a href="#">Roe Parter</a></li>
          <li><a href="#">Diana Penty</a></li>
          <li><a href="#">Martin Paw</a></li>
          <li><a href="#">Doe Alex</a></li>
          <li><a href="#">Aiana Lexa</a></li>
          <li><a href="#">Rexel Mags</a></li>
          <li><a href="#">Tiana Loths</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Sales</li>
          <li><a href="#">Delivered</a></li>
          <li><a href="#">Pending</a></li>
          <li><a href="#">Returned</a></li>
          <li><a href="#">Delivered</a></li>
          <li><a href="#">Pending</a></li>
          <li><a href="#">Returned</a></li>
          <li><a href="#">Delivered</a></li>
          <li><a href="#">Pending</a></li>
          <li><a href="#">Delivered</a></li>
        </ul>
        <ul class="details">
          <li class="topic">Total</li>
          <li><a href="#">$204.98</a></li>
          <li><a href="#">$24.55</a></li>
          <li><a href="#">$25.88</a></li>
          <li><a href="#">$170.66</a></li>
          <li><a href="#">$56.56</a></li>
          <li><a href="#">$44.95</a></li>
          <li><a href="#">$67.33</a></li>
          <li><a href="#">$23.53</a></li>
          <li><a href="#">$46.52</a></li>
        </ul>
      </div> -->
      <!-- <div class="button" id="see-all">
        <a href="#">Ver todos</a>
      </div> -->

    </div>
  </div>


  <div class="sales-boxes pt-3 pb-3 mx-5">
    <div class="recent-sales ">
      <h6 class="border-bottom pb-2 mb-0">Reportes guardados</h6>
      <div class="d-flex text-muted pt-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
          <g transform="rotate(180 12 12)">
            <path fill="currentColor" d="M15 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9l-6-6m4 16H5V5h9v5h5m-2 4H7v-2h10m-3 5H7v-2h7" />
          </g>
        </svg>
        <p class="pb-3 mb-0 small lh-sm">
          <strong class="d-block text-gray-dark">Movimientos de la quincena</strong>
          Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
        </p>
      </div>
      <h6 class="border-bottom pb-2 mb-0"></h6>

      <div class="d-flex text-muted pt-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
          <g transform="rotate(180 12 12)">
            <path fill="currentColor" d="M15 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9l-6-6m4 16H5V5h9v5h5m-2 4H7v-2h10m-3 5H7v-2h7" />
          </g>
        </svg>
        <p class="pb-3 mb-0 small lh-sm">
          <strong class="d-block text-gray-dark">Gastos del mes</strong>
          Some more representative placeholder content, related to this other user. Another status update, perhaps.
        </p>
      </div>
      <h6 class="border-bottom pb-2 mb-0"></h6>

      <div class="d-flex text-muted pt-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
          <g transform="rotate(180 12 12)">
            <path fill="currentColor" d="M15 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9l-6-6m4 16H5V5h9v5h5m-2 4H7v-2h10m-3 5H7v-2h7" />
          </g>
        </svg>
        <p class="pb-3 mb-0 small lh-sm">
          <strong class="d-block text-gray-dark">Valor de la casa</strong>
          This user also gets some representative placeholder content. Maybe they did something interesting, and you really want to highlight this in the recent updates.
        </p>
      </div>
      <h6 class="border-bottom pb-2 mb-0"></h6>

      <div class="button pt-3" id="see_alls">
        <a href="#" id="see_all">Ver todos</a>
      </div>
    </div>

  </div>
</div>

</section>

<?php
require('../footer.php');
?>