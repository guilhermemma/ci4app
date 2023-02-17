# ci4app
Estrutura

Esse projeto é uma API REST utilizando o framework PHP Codeigniter e o banco de dados MySQL. Utilizei também o Xampp e o Composer nesse projeto.  

Rotas

$routes->get('cliente', 'Cliente::list');
$routes->post('cliente/create', 'Cliente::create');
$routes->get('cliente/show/(:num)', 'Cliente::show/$1');  
$routes->post('cliente/update/(:num)', 'Cliente::update/$1');    
$routes->delete('cliente/delete/(:num)', 'Cliente::delete/$1');    


$routes->get('produto', 'Produto::list');
$routes->post('produto/create', 'Produto::create');
$routes->get('produto/show/(:num)', 'Produto::show/$1');  
$routes->post('produto/update/(:num)', 'Produto::update/$1');    
$routes->delete('produto/delete/(:num)', 'Produto::delete/$1');  


$routes->get('pedido', 'Pedido::list');
$routes->post('pedido/create', 'Pedido::create');
$routes->get('pedido/show/(:num)', 'Pedido::show/$1');  
$routes->post('produto/update/(:num)', 'Pedido::update/$1');    
$routes->delete('pedido/delete/(:num)', 'Pedido::delete/$1');  





Conclusão

Particularmente gostei muito de fazer esse projeto, aprendi muito pesquisando este framework, achei ele prático e com uma curva de aprendizado pequena e por isso me adaptei muito bem utilizando ele.
Acabei tendo um pouco de dificuldade para achar conteúdos na língua portuguesa, mas não fiz desse fato me desanimar, achei bons conteúdos em inglês e em espanhol que me ajudaram a concluir esse projeto.
