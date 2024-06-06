<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">PAGES</li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('etape.versListeEtapeAdmin')}}">
      <i class="fa-solid fa-list" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">liste étape</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('deroulement.verxchoixclassementAdmin')}}">
      <i class="fa-solid fa-ranking-star" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">classement coureur</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('equipe.classementEquipeAdmin')}}">
      <i class="fa-solid fa-ranking-star" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">classement equipe</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('course.versClassementEquipeCategorieAdmin')}}">
        <i class="fa-solid fa-ranking-star" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Classement equipe par categorie</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('deroulement.versImportationEtapeResultat')}}">
      <i class="fa-solid fa-file-import" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">importation résultat et étape</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('pointetape.versImportationPoint')}}">
      <i class="fa-solid fa-file-import" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">importation point</span>
      </a>
    </li><li class="nav-item">
      <a class="nav-link" href="{{route('coureurcategorie.genenrationCategorie')}}">
      <i class="fa-solid fa-database" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Générer catégorie</span>
      </a>
    </li>



    <li class="nav-item">
      <a class="nav-link" href="{{route('penalite.versListePenalite')}}">
      <i class="fa-solid fa-list" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Liste pénalité</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('penalite.reintialisationBaseDeDonnee')}}">
        <i class="fa-solid fa-database" style="font-size: 1.2rem;"></i>
        <span class="menu-title" style="margin-left: 10px;">Réinstialisation</span>
      </a>
    </li>
  </ul>
</nav>