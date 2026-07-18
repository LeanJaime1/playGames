<?php

class Alerta
{


//methods

    /**
     * Registra una alerta en el sistema, guardandola en la sesión.
     * @param string $tipo el tipo de alerta danger/warning/succes.
     * @param string $mensaje El contenido de la alerta.
     */
    public static function add_alerta(string $tipo, string $mensaje)
    {

        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    /**
     * Vacia la lista de alertas.
     */
    public static function clear_alerta()
    {
        $_SESSION['alertas'] = [];
    }

    /**
     * Devuelve todas las alertas acumuladas en el sistema, y vacía la lista.
     * @return string
     */
    public static function get_alertas()
    {
        if (!empty($_SESSION['alertas'])) {

            $alertasActuales = "";
            foreach ($_SESSION['alertas'] as $alerta) {
                $alertasActuales .= self::print_alerta($alerta);
            }
            self::clear_alerta();
            return $alertasActuales;
        } else {
            return null;
        }
    }

 /**
     * Genera el bloque de HTML para una alerta.
     * @param array $alerta Un array asociativo que debe contener las llaves 'tipo' y 'mensaje'.
     * @return string El código HTML renderizado de la alerta.
     */
    public static function print_alerta(array $alerta): string {
        
        
        $configuracion = [
            'success' => [
                'clase_bg'   => 'bg-success text-white',
                'icono'      => '<i class="bi bi-check-circle-fill fs-4 me-3 text-white"></i>',
                'btn_close'  => 'btn-close-white'
            ],
            'danger' => [
                'clase_bg'   => 'bg-danger text-white',
                'icono'      => '<i class="bi bi-x-circle-fill fs-4 me-3 text-white"></i>',
                'btn_close'  => 'btn-close-white'
            ],
            'warning' => [
                'clase_bg'   => 'bg-warning text-dark', 
                'icono'      => '<i class="bi bi-exclamation-triangle-fill fs-4 me-3 text-dark"></i>',
                'btn_close'  => ''
            ]
        ];

        
        $estilo = $configuracion[$alerta['tipo']] ?? [
            'clase_bg'   => 'bg-info text-white',
            'icono'      => '<i class="bi bi-info-circle-fill fs-4 me-3 text-white"></i>',
            'btn_close'  => 'btn-close-white'
        ];

        
        $html = "<div class='alert alert-dismissible fade show d-flex align-items-center p-3 border-0 shadow-lg {$estilo['clase_bg']}' role='alert' style='border-radius: 8px;'>";
        
        $html .= $estilo['icono']; 
        $html .= "<div class='fw-bold'>" . $alerta['mensaje'] . "</div>";
        $html .= "<button type='button' class='btn-close {$estilo['btn_close']}' data-bs-dismiss='alert' aria-label='Close' style='padding: 1.25rem;'></button>";
        $html .= "</div>";

        return $html;
    }
}
