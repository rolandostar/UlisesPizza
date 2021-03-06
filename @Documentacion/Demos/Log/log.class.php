<?php 
    class PHPLogger{    
        private $log_file;
        private $level;
    
        function __construct($level = 4) {
            $log_file = $_SERVER['DOCUMENT_ROOT']."/log/". DIRECTORY_SEPARATOR. 'log_'. date('Y-m-d'). '.log';
            $this->log_file = $log_file;
            $this->level = $level;

            if(!file_exists($log_file)) touch($log_file);
            if(!(is_writable($log_file) || $this->win_is_writable($log_file)))  
               throw new Exception("LOGGER ERROR: Can't write to log", 1);
        }
           
        /* Nivel 4 */
        public function d($message){
            if($this->level >= 4) $this->writeToLog("DEBUG", $message);
        }

        /* Nivel 3 */
        public function e($message){
            if($this->level >= 3) $this->writeToLog("ERROR", $message);
        }

        /* Nivel 2 */
        public function w($message){
            if($this->level >= 2) $this->writeToLog("WARN", $message);
        }

        /* Nivel 1 */
        public function i($message){
            if($this->level >= 1) $this->writeToLog("INFO", $message);
        }
       
        private function writeToLog($status,$message) {
            $script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);        
            $date = date('[Y-m-d H:i:s]');
            $msg = "$date: [$status] - ($script_name) $message" . PHP_EOL;
            file_put_contents($this->log_file, $msg, FILE_APPEND);
        }

        //Function lifted from wordpress
        //see: http://core.trac.wordpress.org/browser/tags/3.3/wp-admin/includes/misc.php#L537
        private function win_is_writable( $path ) {
            /* will work in despite of Windows ACLs bug
             * NOTE: use a trailing slash for folders!!!
             * see http://bugs.php.net/bug.php?id=27609
             * see http://bugs.php.net/bug.php?id=30931
             */
            if ( $path[strlen( $path ) - 1] == '/' ) // recursively return a temporary file path
                return win_is_writable( $path . uniqid( mt_rand() ) . '.tmp');
            else if ( is_dir( $path ) )
                return win_is_writable( $path . '/' . uniqid( mt_rand() ) . '.tmp' );
            
            // check tmp file for read/write capabilities
            $should_delete_tmp_file = !file_exists( $path );
            $f = @fopen( $path, 'a' );
            if ( $f === false )
                return false;
            
            fclose( $f );

            if ( $should_delete_tmp_file )
                unlink( $path );

            return true;
        }        
    }
?>