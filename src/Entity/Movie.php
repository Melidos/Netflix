<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $synopsis;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $release_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $runtime;

    /**
     * @ORM\Column(type="integer")
     */
    private $moviedb_id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="hasSeen")
     */
    private $hasSeen;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Genres", inversedBy="movies")
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poster;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background;

    /**
     * @ORM\Column(name="created_at", type="datetime", options={"default": "CURRENT_TIMESTAMP"}, nullable=false)
    */
    private $created_at;

    public function __construct()
    {
        $this->hasSeen = new ArrayCollection();
        $this->genre = new ArrayCollection();
        $this->created_at = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(?\DateTimeInterface $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }


    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    public function setRuntime(?int $runtime): self
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getMoviedbId(): ?int
    {
        return $this->moviedb_id;
    }

    public function setMoviedbId(int $moviedb_id): self
    {
        $this->moviedb_id = $moviedb_id;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getHasSeen(): Collection
    {
        return $this->hasSeen;
    }

    public function addHasSeen(User $hasSeen): self
    {
        if (!$this->hasSeen->contains($hasSeen)) {
            $this->hasSeen[] = $hasSeen;
            $hasSeen->addHasSeen($this);
        }

        return $this;
    }

    public function removeHasSeen(User $hasSeen): self
    {
        if ($this->hasSeen->contains($hasSeen)) {
            $this->hasSeen->removeElement($hasSeen);
            $hasSeen->removeHasSeen($this);
        }

        return $this;
    }

    /**
     * @return Collection|Genres[]
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genres $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genres $genre): self
    {
        if ($this->genre->contains($genre)) {
            $this->genre->removeElement($genre);
        }

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = "https://image.tmdb.org/t/p/original" . $poster;

        return $this;
    }

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(?string $background): self
    {
        $this->background = "https://image.tmdb.org/t/p/original" . $background;

        return $this;
    }
}
