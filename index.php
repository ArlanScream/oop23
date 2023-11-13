<?
    //создаем интерфейс
    interface AutoInterface{
        public function signal();

        public function wipers();
    }
// создаем абстрактный класс Auto и прописываем функции
    abstract class Auto implements AutoInterface{

        public function powerOn(){
            echo ("Двигатель запушен\n");
        }
    
        public function powerOff(){
            echo ("Двигатель остановлен\n"); 
        }

        public function moveForward(){
            echo ("Движение вперед\n");
        }

        public function moveBackrward(){
            echo ("Движение назад\n");
        }

    }
// создаем абстрактный класс AbstractCar и прописываем функции
    abstract class AbstractCar extends Auto {
        protected $signalSound = "beepSong\n";
        protected $wipersSound = "fshh-fshh\n";
        public $nitro = 100;

        public function checkNitro(){
            return $this->nitro > 0;
        }

        public function useNitro(){

            if ($this->checkNitro()){
                echo ( "Осталось азота: ". $this->nitro ."%\n" );
                $this->nitro -= 10;
            } else {
                echo ("Азот закончился\n");
            }

        }
    }
// создаем абстрактный класс AbstractTank и прописываем функции
    abstract class AbstractTank extends Auto {
        protected $signalSound = "loudSong";
       
        public $bullet = 5;

        public function moveTurretLeft(){
            echo ("Поворот башни <\n");
        }
        
        public function moveTurretRigth(){
            echo ("Поворот башни >\n");
        }

        public function fire(){
            if ($this->checkBullets()){
                echo ("Боезопас: " . $this->bullet. "\n");
                $this->bullet -= 1 ;
            } else {
                echo ("Боезапас закончился\n");
            }
        }

        public function checkBullets(){
            return $this->bullet > 0;
        }
    }

   
// создаем абстрактный класс AbstractTech и прописываем функции
    abstract class AbstractTech extends Auto {
        protected $signalSound = "longSong\n";

        public function moveScoop(){
            echo ("Движение ковшом\n");
        }
    }
// создаем  класс Tank рассширеный из абстрактного класса AbstractTank
    class Tank extends AbstractTank {
        public function signal(){
            echo($this->signalSound);
        }

        public function wipers(){
            echo("none");
            
        }
    }
// создаем  класс Tech рассширеный из абстрактного класса AbstractTech
    class Tech extends AbstractTech{
        

        public function signal(){
            echo($this->signalSound);
        }

        public function wipers(){
            echo("none");
        }
    }
// создаем  класс Car рассширеный из абстрактного класса AbstractCar
    class Car extends AbstractCar{
        
        public function signal(){
            echo($this->signalSound);
        }

        public function wipers(){
            echo($this->wipersSound);
        }
    }
// инициализируем объекты
    $machine = new Tank;
    $car = new Car;
  // создаем функцию testMachine для проверки функций класса Tank  
    function testMachine(Auto $machine){
        $machine->moveForward();
        $machine->moveTurretRigth();
        $machine->fire();
        $machine->fire(); 
        $machine->fire();
        
    }
    // создаем функцию testCar для проверки функций класса Car
    function testCar(Auto $car){
        $car->powerOn();
        $car->moveForward();
        $car->useNitro();
        $car->signal();
        $car->useNitro();
        $car->wipers();
    }

    testCar($car);
    testMachine($machine);
   
     