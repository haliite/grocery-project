<header>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid col-lg-8 p-4">
    <ul class="navbar nav">
      <li class="nav-item">
        <a class="navbar-brand" href="index.php">
          <img src="img/logo.svg" height="80"/>  <!-- logo -->
        </a>
      </li>
      <li class="nav-item px-2">
        <a class="nav-link" href="index.php">Home</a>
      </li>
    </ul>
    
    <form class="d-flex col-lg-6" role="search" action="index.php">
      <div class="input-group">
        <input class="form-control" name="product_search" type="search" placeholder="Search for a product..." aria-label="Search">
        <span class="input-group-text">
          <button class="btn btn-link p-0" type="submit" value="Retrieve Data">
            
            <i class="bi bi-search"></i>
          </button>
        </span>
        <!-- <button class="btn btn-outline-success" type="submit" value="Retrieve Data">Search</button> -->
        
      </div>
    </form>
          
    <a class="btn d-flex col-2" href="cart.php">
      <i class="bi bi-cart align-middle my-auto h3"></i>
      <span class="my-auto align-middle px-2">
        Cart
      </span>
    </a>
  </div>
</nav>
</header>