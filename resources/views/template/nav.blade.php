<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">PAGES</li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('course.allCourseEquipe')}}">
        <i class="fa-solid fa-list" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Liste étape</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{route('deroulement.verxchoixclassement')}}">
        <i class="fa-solid fa-ranking-star" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Classement</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('equipe.classementEquipe')}}">
        <i class="fa-solid fa-ranking-star" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Classement equipe général</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('course.versClassementEquipeCategorie')}}">
        <i class="fa-solid fa-ranking-star" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Classement equipe par categorie</span>
      </a>
    </li>
  </ul>
</nav>