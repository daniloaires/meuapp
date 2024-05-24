<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <!-- Dropdown Usuários -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Usuários
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?= $this->Html->link(__('Grupos'), '/roles', ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link(__('Usuários'), '/users', ['class' => 'dropdown-item']) ?>
      </div>
    </li>
    <!-- Outros itens de menu -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cadastro
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?= $this->Html->link(__('Pessoas'), '/peoples', ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link(__('Setores'), '/sectors', ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link(__('Colaboradores'), '/employees', ['class' => 'dropdown-item']) ?>
      </div>
    </li>      
  </ul>
</div>