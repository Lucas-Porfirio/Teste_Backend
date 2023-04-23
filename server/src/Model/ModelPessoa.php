<?php
namespace Source\Model;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\OneToMany;
/**
 * @ORM\Entity(repositoryClass="Source\Model")
 * @ORM\Table(name="pessoa")
 */
class ModelPessoa
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private $id;

    /** @ORM\Column(type="sting", nullable=false) */
    private $nome;

    /** @ORM\Column(type="string", nullable=false) */
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