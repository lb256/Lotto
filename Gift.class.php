<?php



Class Gift {
    protected $type;
    public $name;
    public $value;
    public $cur = '$';
    public $image;
    public $js_convert = 'convert.js';
    private $types = ['thing', 'money', 'bonus'];
    public  $k =10;

  public function __construct($type){
      if(!in_array($type, $this->types)){
          throw new Exception('Unknown gift type, Must be one of these: '.implode(',', $this->types));
      }
      $this->type = $type;
  }

  protected function check(){
      if (($this->type == 'money' || $this->type == 'bonus') && !is_numeric($this->value)){
          throw new Exception('Unknown value');
      }

      if ($this->type == 'thing' && strlen($this->name) < 1) {
          throw  new Exception('Unknown name of thing');
      }

  }

  public function draw(){
      $this->check();

      if($this->type == 'thing') {
          return $this->drawThing();
      }else if($this->type == 'money') {
          return $this->drawMoney();
      }else {
          return $this->drawBonus();
      }

  }

  protected function drawThing(){
      return '
            <h4>' . $this->name . '</h4>
            <img src="' . $this->image . '">
            <br>
            <form class = "form-shipping" action="shipping.php">
            <input  class="btn btn-success" id="shipping" value="Go to shipping form" />
            <br><br><input type="button" class="btn btn-danger" id="bank-wire" value="Cancel prize" />
            </form>
            ';
  }

  protected function drawMoney(){
      return '
            <h4>' . $this->name . '</h4>
            <h2>' . $this->value . ' ' . $this->cur . '</h2>
            <img src="' . $this->image . '">
            <br>
                <form>
                    <div class ="form-inline div-main">
                        <input type="button" class="btn btn-success" id="convert" value="Convert to bonus" />
                        <input type="button" class="btn btn-success" id="bank-wire" value="to bank wire" />
                         <br><br><input type="button" class="btn btn-danger" id="bank-wire" value="Cancel prize" />
                    </div>
                </form>
            ' .'<script>'.str_replace('8E8', $this->value * $this->k, file_get_contents($this->js_convert)).'</script>';
  }

  protected function drawBonus(){
      return '
            <h4>' . $this->name . '</h4>
            <h2>' . $this->value .'</h2>
            <img src="' . $this->image . '">
            <br><br><input type="button" class="btn btn-danger" id="bank-wire" value="Cancel prize" />
            ';
  }
}
