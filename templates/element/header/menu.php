<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">

    <!-- Cadastro -->
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

    <!-- Financeiro -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Financeiro
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?= $this->Html->link(__('Contas a pagar/receber'), '#', ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link(__('Fluxo de Caixa'), '#', ['class' => 'dropdown-item']) ?>
      </div>
    </li>        

    <!-- Configurações -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Configurações
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <?= $this->Html->link(__('Grupos'), '/roles', ['class' => 'dropdown-item']) ?>
        <?= $this->Html->link(__('Usuários'), '/users', ['class' => 'dropdown-item']) ?>
      </div>
    </li>    

  </ul>
</div>