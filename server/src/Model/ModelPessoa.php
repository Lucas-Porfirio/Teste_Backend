<?php
namespace Source\Model;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity, ORM\Table('pessoa')]
class ModelPessoa extends ModelBase
{
    #[ORM\Id, ORM\Column('id', 'integer'), ORM\GeneratedValue]
    private $id;

    #[ORM\Column('nome', 'string')]
    private $nome;

    #[ORM\Column('cpf', 'string')]
    private $cpf;

    /**
     * @var Collection<int, ModelPessoa>
     */
    #[OneToMany(targetEntity: ModelContato::class, mappedBy: 'contato')]
    private Collection $ModelContato;

    public function __construct() {
        $this->ModelContato = new ArrayCollection();
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }
}