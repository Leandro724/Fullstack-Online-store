/**
* Template Name: MyResume - v4.3.0
* Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }


  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos,
      behavior: 'smooth'
    })
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('body').classList.toggle('mobile-nav-active')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let body = select('body')
      if (body.classList.contains('mobile-nav-active')) {
        body.classList.remove('mobile-nav-active')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

})()





// Toggle Form
var LoginForm = document.getElementById("LoginForm");
var RegisterForm = document.getElementById("RegisterForm");
var ActiverForm = document.getElementById("ActiveForm");

function Register(){
  RegisterForm.style.transform = "translateX(0px)";
  LoginForm.style.transform = "translateX(0px)";
  ActiverForm.style.transform = "translateX(100px)";
}
function Login(){
  RegisterForm.style.transform = "translateX(18rem)";
  LoginForm.style.transform = "translateX(18rem)";
  ActiverForm.style.transform = "translateX(0px)";
}

// Fetch APIs

// API for all products
// METHOD: GET
const AllProducts = document.querySelector('.AllProducts');
const AllProducts_2 = document.getElementById("AllProducts_2");
const AllProducts_3 = document.getElementById("AllProducts_3");
const Arrivals = document.getElementById("Arrivals");
const Featured = document.getElementById("Featured");
const Products = 'http://localhost/My_Rest_API/api/Products/read.php';
let displayProducts = '';
let displayProducts_2 = '';
let displayProducts_3 = '';
let displayProducts_4 = '';
let displayProducts_5 = '';

// Display on All Products Page 1
fetch(Products)
.then(res => res.json())
.then(data => {
// Display all products 
for (let i = 0; i < 12; i++) {
  displayProducts+=`
                  <div id="col-3" class="Fproduct col-3">
                    <img id="img" src=${data[i].Prod_Img_1} class="img-fluid" alt="#">
                      <ul>
                        <li>
                          <div class="data">
                            <strong>${data[i].Prod_Name}</strong>
                          </div>
                        </li>
                        <li>
                          <div class="data">
                            <strong>R${data[i].Prod_Price}.00</strong>
                          </div>
                        </li>
                      </ul>
                  </div>
  `;
  AllProducts.innerHTML = displayProducts;
  console.log(AllProducts_2);
}

});
// Display on All Products Page 2
fetch(Products)
.then(res => res.json())
.then(data => {
// Display all products
for (let i = 12; i < 24; i++) {
  displayProducts_2+=`
                  <div id="col-3" class="Fproduct col-3">
                    <img id="img" src=${data[i].Prod_Img_1} class="img-fluid" alt="#">
                      <ul>
                        <li>
                          <div class="data">
                            <strong>${data[i].Prod_Name}</strong>
                          </div>
                        </li>
                        <li>
                          <div class="data">
                            <strong>R${data[i].Prod_Price}.00</strong>
                          </div>
                        </li>
                      </ul>
                  </div>
  `;
  AllProducts_2.innerHTML = displayProducts_2;
  console.log(AllProducts_2);
}

});
// Display on All Products Page 3
fetch(Products)
.then(res => res.json())
.then(data => {
// Display all products
for (let i = 24; i < 32; i++) {
  displayProducts_3+=`
                  <div id="col-3" class="Fproduct col-3">
                    <img id="img" src=${data[i].Prod_Img_1} class="img-fluid" alt="#">
                      <ul>
                        <li>
                          <div class="data">
                            <strong>${data[i].Prod_Name}</strong>
                          </div>
                        </li>
                        <li>
                          <div class="data">
                            <strong>R${data[i].Prod_Price}.00</strong>
                          </div>
                        </li>
                      </ul>
                  </div>
  `;
  AllProducts_3.innerHTML = displayProducts_3;
  console.log(AllProducts_3);
}

});
// Display on Home Page Arrivals
fetch(Products)
.then(res => res.json())
.then(data => {
// Display all products
for (let i = 9; i < 17; i++) {
  displayProducts_4+=`
  <div id="col-3" class="Fproduct col-lg-3 col-md-6">
                   
  <img id="img" src=${data[i].Prod_Img_1} class="img-fluid" alt="#">

<ul>
  <li>
    <div class="data">
        <strong>${data[i].Prod_Name}</strong>
    </div>
  </li>

  <li>
    <div class="data">
        <strong>R${data[i].Prod_Price}.00</strong>
    </div>
  </li>
</ul>
</div>
  `;
  Arrivals.innerHTML = displayProducts_4;
  console.log(Arrivals);
}

});
// Display on Home Page Featured
fetch(Products)
.then(res => res.json())
.then(data => {
// Display all products
for (let i = 23; i < 27; i++) {
  displayProducts_5+=`
  <div id="col-3" class="Fproduct col-lg-3 col-md-6">
                   
  <img id="img" src=${data[i].Prod_Img_1} class="img-fluid" alt="#">

<ul>
  <li>
    <div class="data">
        <strong>${data[i].Prod_Name}</strong>
    </div>
  </li>

  <li>
    <div class="data">
        <strong>R${data[i].Prod_Price}.00</strong>
    </div>
  </li>
</ul>
</div>
  `;
  Featured.innerHTML = displayProducts_5;
  console.log(Featured);
}

});
