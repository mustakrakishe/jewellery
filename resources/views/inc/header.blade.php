<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Jewellery</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="{{ route('home') }}">Главная</a>
    <a class="p-2 text-dark" href="{{ route('catalogue') }}">Каталог</a>

    @auth
      @if(Auth::user()->role == 'admin')
        <a class="p-2 text-dark" href="{{ route('catalogue_addProduct') }}">Добавить продукт</a>
      @endif
    @endauth

    <a class="p-2 text-dark" href="#">Корзина</a>
    <a class="p-2 text-dark" href="#">О нас</a>
  </nav>

  @auth
    <a class="btn btn-outline-primary" href="{{ route('logout') }}">Выйти</a>
  @else
    <a class="btn btn-outline-primary" href="{{ route('login') }}">Войти</a>
    <a class="ml-2 btn btn-outline-primary" href="{{ route('register') }}">Регистрация</a>
  @endauth
</div>