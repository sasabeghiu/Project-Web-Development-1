<?php
class Resident implements JsonSerializable
{
	public function jsonSerialize(): mixed
	{
		return get_object_vars($this);
	}

	private int $id;
	private string $name;
	private string $description;
	private string $photo;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhoto(): string
	{
		return $this->photo;
	}

	/**
	 * @param string $photo 
	 * @return self
	 */
	public function setPhoto(string $photo): self
	{
		$this->photo = $photo;
		return $this;
	}
}
