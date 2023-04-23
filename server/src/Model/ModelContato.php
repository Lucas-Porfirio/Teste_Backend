<?php
namespace Source\Model;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
/**
 * @ORM\Entity(repositoryClass="Source\Model")
 * @ORM\Table(name="contato")
 */
class ModelContato
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id;

    /** @ORM\Column(type="boolean", nullable=false) */
    private $tipo;

    /** @ORM\Column(type="sting", nullable=true) */
    private $descricao;

    #[ManyToOne(targetEntity: ModelPessoa::class, inversedBy: 'pessoa')]
    #[JoinColumn(name: 'idPessoa', referencedColumnName: 'id')]
    private ModelPessoa|null $ModelPessoa = null;

    public function setId(int $id): void
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

    
}