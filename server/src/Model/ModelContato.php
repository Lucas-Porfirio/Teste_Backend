<?php
namespace Source\Model;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Entity, ORM\Table('contato')]
class ModelContato extends ModelBase
{
    #[ORM\Id, ORM\Column('id', 'integer'), ORM\GeneratedValue]
    private $id;

    #[ORM\Column('tipo', 'boolean')]
    private $tipo;

    #[ORM\Column('descricao', 'string', nullable:true)]
    private $descricao;

    #[ManyToOne(targetEntity: ModelPessoa::class, inversedBy:'contato')]
    #[JoinColumn(name: 'idPessoa', referencedColumnName: 'id')]
    private ModelPessoa|null $ModelPessoa = null;

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTipo(bool $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getTipo(): ?bool
    {
        return $this->tipo;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function getModelPessoa() : ModelPessoa
    {
        $this->ModelPessoa ??= new ModelPessoa();
        return $this->ModelPessoa;
    }

    public function setModelPessoa(ModelPessoa $ModelPessoa)
    {
        $this->ModelPessoa = $ModelPessoa;
        return $this;
    }

    public function getDescricaoTipo() {
        return $this->getTipo() ? 'Email' : 'Telefone';
    }
}