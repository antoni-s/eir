<?php

use PHPUnit\Framework\TestCase;
use App\Models\Entidades\Usuario;

/**
 *
 */
class UsuarioTest extends TestCase
{

  public function testUsuarioId( )
  {
    $u = $this->createMock(Usuario::class);

    $u->method('getId')->willReturn(NULL);

    $this->assertEquals(NULL, $u->getId());

    $u = $this->createMock(Usuario::class);
    $u->method('setId')->willReturn('');
    $this->assertEquals('',$u->setId(123));

  }

  public function testUsuarioNome()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getNome')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getNome());

    $u = $this->createMock(Usuario::class);
    $u->method('setNome')->willReturn('');
    $this->assertEquals('',$u->setNome('dsadsadsa'));
  }

  public function testUsuarioSenha()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getSenha')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getSenha());

    $u = $this->createMock(Usuario::class);
    $u->method('setSenha')->willReturn('');
    $this->assertEquals('',$u->setSenha(123));
  }

  public function testUsuarioCpf()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getCpf')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCpf());

    $u = $this->createMock(Usuario::class);
    $u->method('setCpf')->willReturn('');
    $this->assertEquals('',$u->setCpf('123.123.123-12'));
  }

  public function testUsuarioDataNascimento()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getDataNascimento')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getDataNascimento());

    $u = $this->createMock(Usuario::class);
    $u->method('setDataNascimento')->willReturn('');
    $this->assertEquals('',$u->setDataNascimento('13/02/1998'));
  }

  public function testUsuarioLogradouro()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getLogradouro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getLogradouro());

    $u = $this->createMock(Usuario::class);
    $u->method('setLogradouro')->willReturn('');
    $this->assertEquals('',$u->setLogradouro('dsadsadsadsadsa'));
  }

  public function testUsuarioBairro()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getBairro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getBairro());

    $u = $this->createMock(Usuario::class);
    $u->method('setBairro')->willReturn('');
    $this->assertEquals('',$u->setBairro('dsadsadsa'));
  }

  public function testUsuarioCep()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getCep')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCep());

    $u = $this->createMock(Usuario::class);
    $u->method('setCep')->willReturn('');
    $this->assertEquals('',$u->setCep(74000-000));
  }

  public function testUsuarioCidade()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getCidade')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getCidade());

    $u = $this->createMock(Usuario::class);
    $u->method('setCidade')->willReturn('');
    $this->assertEquals('',$u->setCidade('Goiânia'));
  }

  public function testUsuarioUf()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getUf')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getUf());

    $u = $this->createMock(Usuario::class);
    $u->method('setUf')->willReturn('');
    $this->assertEquals('',$u->setUf('GO'));
  }

  public function testUsuarioComplemento()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getComplemento')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getComplemento());

    $u = $this->createMock(Usuario::class);
    $u->method('setComplemento')->willReturn('');
    $this->assertEquals('',$u->setComplemento('dsadsadsa'));
  }

  public function testUsuarioTelefone()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getTelefone')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getTelefone());

    $u = $this->createMock(Usuario::class);
    $u->method('setTelefone')->willReturn('');
    $this->assertEquals('',$u->setTelefone('(66)99998-9999'));
  }

  public function testUsuarioEmail()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getEmail')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getEmail());

    $u = $this->createMock(Usuario::class);
    $u->method('setEmail')->willReturn('');
    $this->assertEquals('',$u->setEmail('test@test.com.br'));
  }

  public function testUsuarioNomeMae()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getNomeMae')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getNomeMae());

    $u = $this->createMock(Usuario::class);
    $u->method('setNomeMae')->willReturn('');
    $this->assertEquals('',$u->setNomeMae('dsadsadsadsadsadsadsadsadsadsa'));
  }

  public function testUsuarioInformacoes()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getInformacoes')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getInformacoes());

    $u = $this->createMock(Usuario::class);
    $u->method('setInformacoes')->willReturn('');
    $this->assertEquals('',$u->setInformacoes('dsadsadsadsadsadsadsadsadsa'));
  }

  public function testUsuarioDataCadastro()
  {
    $u = $this->createMock(Usuario::class);
    $u->method('getDataCadastro')->willReturn(NULL);
    $this->assertEquals(NULL, $u->getDataCadastro());

    $u = $this->createMock(Usuario::class);
    $u->method('setDataCadastro')->willReturn('');
    $this->assertEquals('',$u->setDataCadastro('17102017'));
  }
}

 ?>
