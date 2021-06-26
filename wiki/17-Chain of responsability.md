# Chain of responsability

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Quels problèmes le modèle de conception de la chaîne de responsabilité peut-il résoudre?

* Il faut éviter de coupler l'expéditeur d'une requête à son destinataire.
* Il devrait être possible que plus d'un récepteur puisse traiter une demande.

L'implémentation d'une requête directement dans la classe qui envoie la requête est inflexible car elle couple la classe à un récepteur particulier et rend impossible la prise en charge de plusieurs récepteurs.

![image](./resources/Chain-of-responsability.jpg)

Quelle solution le modèle de conception de la chaîne de responsabilité décrit-il ?

* Définissez une chaîne d'objets récepteurs ayant la responsabilité, en fonction des conditions d'exécution, de traiter une demande ou de la transmettre au récepteur suivant de la chaîne (le cas échéant).

* Cela nous permet d'envoyer une requête à une chaîne de récepteurs sans avoir à savoir lequel traite la requête. La demande est transmise le long de la chaîne jusqu'à ce qu'un récepteur traite la demande. L'expéditeur d'une requête n'est plus couplé à un destinataire particulier.

___

## 📑 Implémentation

*Handler*

```php
abstract class Logger
{

    const ALL = 0;

    const INFO = 1;

    const DEBUG = 2;

    protected int $level;

    protected ?Logger $next = null;

    abstract protected function writeMessage(string $msg): void;

    public function __construct(int $level)
    {
        $this->level = $level;
    }

    public function setNext(Logger $nextLogger): Logger
    {
        $this->next = $nextLogger;
        return $nextLogger;
    }

    public function message(string $msg, int $level): Logger
    {
        if ($level === $this->level) {
            $this->writeMessage($msg);
        }
        if ($this->next) {
            $this->next->message($msg, $level);
        }
        return $this;
    }

}
```

*Members*

```php
class ConsoleLogger extends Logger
{

    protected function writeMessage(string $msg): void
    {
        echo "Writing to console: $msg\n";
    }

}

class EmailLogger extends Logger
{

    protected function writeMessage(string $msg): void
    {
        echo "Sending via email: $msg\n";
    }

}

class FileLogger extends Logger
{

    protected function writeMessage(string $msg): void
    {
        echo "Writing to a log file: $msg\n";
    }

}
```

*Utilisation*

```php
$logger = new ConsoleLogger(Logger::ALL);
$logger
    ->setNext(new EmailLogger(Logger::INFO)
    ->setNext(new FileLogger(Logger::DEBUG);
$logger
    ->message(
        "Entering function ProcessOrder().", 
        Logger::ALL
    )
    ->message(
        "Order record retrieved.",
        Logger::DEBUF
    )
    ->message(
        "Customer Address details missing in Branch DataBase.",
        Logger::INFO
    )
    ->message(
        "Customer Address details missing in Branch DataBase.",
        Logger::INFO
    );
```