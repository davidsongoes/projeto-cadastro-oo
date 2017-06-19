<?php
/**
 * Created by PhpStorm.
 * User: santana
 * Date: 01/02/15
 * Time: 21:23
 */
namespace components;
 class Helper{
     static public $situacao = [
         '1' => "Ativa",
         '2' => "R1",
         '3' => "REFM",
     ];
    static public $secoes = [
        '1' => 'DG',
        '2' => 'VICENS',
        '3' => 'GABENS',
        '4' => 'SECAJ',
        '5' => 'SCS',
        '6' => 'DE-1',
        '7' => 'DE-2',
        '8' => 'DE-3',
        '9' => 'DE-4',
        '10' => 'DE-5',
        '11' => 'DE-6',
        '12' => 'PROTOCOLO',
        '13' => 'SAS',
        '14' => 'SADM',
        '16' => 'BIBLIOTECA',
        '17' => 'SINT',
        '18' => 'STI',
        '19' => 'SPM'
    ];
    static public $posto_graduacoes = [
        '1' => 'TB',
        '2' => 'MB',
        '3' => 'BRG',
        '4' => 'CEL',
        '5' => 'TCEL',
        '6' => 'MAJ',
        '7' => 'CAP',
        '8' => '1T',
        '9' => '2T',
        '10' => 'SO',
        '11' => '1S',
        '12' => '2S',
        '13' => '3S',
        '14' => 'CB',
        '15' => 'SD'
    ];

    static public $tipos = [
        '1' => 'WEB',
        '2' => 'REDE',
        '3' => 'MANUTENÇÃO'
    ];

    static public $prioridades = [
        '1' => 'ROTINA',
        '2' => 'NORMAL',
        '3' => 'URGENTE'
    ];
    static public $especialidades = [
      '1' => 'SAD',
      '2' => 'SIN',
        '3' => 'SDE',
        '4' => 'TAR',
        '5' => 'Aviador',
        '6' => 'Infantaria',
        '7' => 'Intendência',
        '8' => 'SNE'

    ];
     static public $grupos = [
         '1' => 'Usuario',
         '2' => 'Administrador',
         '3' => 'Solucionador.Geral',
         '4' => 'Solucionador.Rede',
         '5' => 'Solucionador.Manutençao',
         '6' => 'Solucionador.Web'
     ];
     static public $status = [
         '0' => 'Aberto',
         '1' => 'Resolvido',
     ];

     static public function mostraAlerta($tipo){
         if(isset($_SESSION[$tipo])): ?>
             <div class="alert alert-<?php echo $tipo?> alert-dismissible fade in" role="alert" id="alert-<?php echo $tipo?>">
                 <button class="close" aria-label="Close" data-dismiss="alert" type="button">
                     <span aria-hidden="true" style="color: #0f0f0f">×</span>
                     </button>
                <?php
                echo $_SESSION[$tipo];
                unset($_SESSION[$tipo]);
                unset($_POST);
                ?>
             </div>

         <?php endif;

     }

}
