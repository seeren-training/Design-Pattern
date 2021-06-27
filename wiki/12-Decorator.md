# Decorator

*  🔖 **Définition**
*  🔖 **Implémentation**

___

## 📑 Définition

Un décorateur permet d'attacher dynamiquement de nouvelles responsabilités à un objet. Les décorateurs offrent une alternative assez souple à l'héritage pour composer de nouvelles fonctionnalités. 

![image](https://raw.githubusercontent.com/seeren-training/Design-Pattern/master/wiki/resources/Decorator.png)

___

## 📑 Implémentation

*Sujet*

```php
interface Displayable
{
	public function display();
}

class Message implements Displayable
{

  private string $message;

  public function __construct(string $message)
  {
    $this->message = $message;
  }

  public function display(): void
  {
    echo $this->message;
  }

}
```

*Decorateur*

```php
abstract class MessageDecorator implements Displayable
{
	
  protected Displayable $message;

  protected function __construct(Displayable $message)
  {
    $this->message = $message;
  }

}

class BoldMessage extends MessageDecorator
{

  public function display(): void
  {
    echo '<strong>';
    $this->message->display();
    echo '</strong>';
  }

}
```

*Utilisation*

```php
$message = new BoldMessage(new Message("Hello World"));
$message->display();
```
