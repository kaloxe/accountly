<?php
require('../header.php');
require('menu.php');
require('nav_bar.php');
?>

<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Order</div>
                <div class="number">40,876</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from yesterday</span>
                </div>
            </div>
            <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Sales</div>
                <div class="number">38,876</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from yesterday</span>
                </div>
            </div>
            <i class='bx bxs-cart-add cart two'></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Profit</div>
                <div class="number">$12,876</div>
                <div class="indicator">
                    <i class='bx bx-up-arrow-alt'></i>
                    <span class="text">Up from yesterday</span>
                </div>
            </div>
            <i class='bx bx-cart cart three'></i>
        </div>
        <div class="box">
            <div class="right-side">
                <div class="box-topic">Total Return</div>
                <div class="number">11,086</div>
                <div class="indicator">
                    <i class='bx bx-down-arrow-alt down'></i>
                    <span class="text">Down From Today</span>
                </div>
            </div>
            <i class='bx bxs-cart-download cart four'></i>
        </div>
    </div>

    <div class="sales-boxes pb-3">
        <!-- <div class="recent-sales box">
            <div class="title">Movimientos recientes</div>
            <div class="sales-details">
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
            </div>
            <div class="button">
                <a href="#">See All</a>
            </div>
        </div> -->


        <div class="recent-sales ">
            <h6 class="border-bottom pb-2 mb-0">Movimientos recientes</h6>

            <div class="d-flex text-muted pt-3">
                <!-- <img src="../images/arrow-circle-up.svg" alt=""> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <path fill="#3de62e" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Salario del trabajo de oficina a cuenta de banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <g transform="rotate(180 12 12)">
                        <path fill="#ff0000" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                    </g>
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Pago de deudas del recibo de luz, agua e internet desde la cuenta del banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <path fill="#3de62e" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Salario del trabajo de oficina a cuenta de banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <path fill="#3de62e" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Salario del trabajo de oficina a cuenta de banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <g transform="rotate(180 12 12)">
                        <path fill="#ff0000" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                    </g>
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Pago de deudas del recibo de luz, agua e internet desde la cuenta del banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <path fill="#3de62e" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Salario del trabajo de oficina a cuenta de banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <g transform="rotate(180 12 12)">
                        <path fill="#ff0000" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                    </g>
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Pago de deudas del recibo de luz, agua e internet desde la cuenta del banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <path fill="#3de62e" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Salario del trabajo de oficina a cuenta de banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>

            <div class="d-flex text-muted pt-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                    <g transform="rotate(180 12 12)">
                        <path fill="#ff0000" d="M11 16h2v-4.2l1.6 1.6L16 12l-4-4l-4 4l1.4 1.4l1.6-1.6V16Zm1 6q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Z" />
                    </g>
                </svg>
                <strong class="d-block text-gray-dark p-2">10.00$</strong>
                <p class="pb-3 mb-0 small lh-sm ">
                    <strong class="d-block text-gray-dark">02 junio 2021 - 01:00 pm</strong>
                    Pago de deudas del recibo de luz, agua e internet desde la cuenta del banco.
                </p>
            </div>
            <h6 class="border-bottom pb-2 mb-0"></h6>
        </div>

        <div class="top-sales box">
            <div class="title">Fuentes</div>
            <ul class="top-sales-details">
                <li>
                    <a href="#">
                        <img src="../images/sunglasses.jpg" alt="">
                        <span class="product">Vuitton Sunglasses</span>
                    </a>
                    <span class="price">$1107</span>
                </li>
                <li>
                    <a href="#">
                        <img src="../images/jeans.jpg" alt="">
                        <span class="product">Hourglass Jeans </span>
                    </a>
                    <span class="price">$1567</span>
                </li>
                <li>
                    <a href="#">
                        <img src="../images/nike.jpg" alt="">
                        <span class="product">Nike Sport Shoe</span>
                    </a>
                    <span class="price">$1234</span>
                </li>
                <li>
                    <a href="#">
                        <img src="../images/scarves.jpg" alt="">
                        <span class="product">Hermes Silk Scarves.</span>
                    </a>
                    <span class="price">$2312</span>
                </li>
                <li>
                    <a href="#">
                        <img src="../images/blueBag.jpg" alt="">
                        <span class="product">Succi Ladies Bag</span>
                    </a>
                    <span class="price">$1456</span>
                </li>
                <li>
                    <a href="#">
                        <img src="../images/bag.jpg" alt="">
                        <span class="product">Gucci Womens's Bags</span>
                    </a>
                    <span class="price">$2345</span>
                <li>
                    <a href="#">
                        <img src="../images/addidas.jpg" alt="">
                        <span class="product">Addidas Running Shoe</span>
                    </a>
                    <span class="price">$2345</span>
                </li>
                <li>
                    <a href="#">
                        <img src="../images/shirt.jpg" alt="">
                        <span class="product">Bilack Wear's Shirt</span>
                    </a>
                    <span class="price">$1245</span>
                </li>
            </ul>
        </div>
    </div>
</div>
</section>

<?php
require('../footer.php');
?>