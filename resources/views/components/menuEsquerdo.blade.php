<aside class="main-sidebar sidebar-dark-primary elevation-4">
         <a href="#" class="brand-link">
            <img src={{asset("img/AdminLTELogo.png")}} alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><b>App</b>Inscrições</span>
         </a>

         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-header">MENU</li>
                  <li class="nav-item menu-open">
                     <a href="{{route('index.adm')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="{{route('index.adm')}}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p> Inscrições <i class="fas fa-angle-left right"></i></p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="{{route('classificacaoPorCargos.adm')}}" class="nav-link">
                              <p> Classificação</p>
                           </a>
                        </li>

                        <li class="nav-item">
                           <a href="{{route('formImpressaoCurriculo.adm')}}" class="nav-link">
                              <p> Gerar Curriculos</p>
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p> Configurações <i class="fas fa-angle-left right"></i></p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                           <a href="#" class="nav-link">
                              <i class="far fa-plus-square nav-icon"></i>
                              <p>Cadastros do Sistema <i class="fas fa-angle-left right"></i></p>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="{{route('edital.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Edital</p>
                                 </a>
                              </li>
                              
                              <li class="nav-item">
                                 <a href="{{route('localCargo.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Locais</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="{{route('titulo.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-award nav-icon"></i>
                                    <p>Títulos</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="{{route('requisito.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Requisito</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="{{route('tipoCargo.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>Tipo Cargo</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="{{route('grupoOcupacional.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-handshake nav-icon"></i>
                                    <p>Grupo Ocupacional</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="{{route('cargo.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-briefcase nav-icon"></i>
                                    <p>Cargos</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="nav-link">
                              <i class="far fa-plus-square nav-icon"></i>
                              <p>Segurança <i class="fas fa-angle-left right"></i></p>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="{{route('permissao.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-door-open nav-icon"></i>
                                    <p>Permissões</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="{{route('grupoUsuario.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-users-cog nav-icon"></i>
                                    <p>Grupos de Usuários</p>
                                 </a>
                              </li>

                              <li class="nav-item">
                                 <a href="{{route('usuario.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-user-plus nav-icon"></i>
                                    <p>Usuarios</p>
                                 </a>
                              </li>
                           </ul>
                        </li>

                        <li class="nav-item">
                           <a href="#" class="nav-link">
                              <i class="far fa-plus-square nav-icon"></i>
                              <p>Homologação Sistema <i class="fas fa-angle-left right"></i></p>
                           </a>
                           <ul class="nav nav-treeview">
                              <li class="nav-item">
                                 <a href="{{route('auditoria.tabela.adm')}}" class="nav-link">
                                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                    <p>Auditoria</p>
                                 </a>

                                 <a href="{{route('formAuditoria.consulta.adm')}}" class="nav-link">
                                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                    <p>Consulta Auditoria</p>
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>