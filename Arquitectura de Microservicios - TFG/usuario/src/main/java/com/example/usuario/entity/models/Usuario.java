package com.example.usuario.entity.models;


import javax.persistence.*;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.NotNull;

@Entity
@Table(name = "usuario")
public class Usuario {

    private static final long serialVarsionUID = 1L;

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id_user;
    @NotEmpty
    private String name;
    @NotNull
    private int edad;
    @NotNull
    private int dni;



    public Usuario() {
        super();
    }

    public Usuario(@NotEmpty String name, @NotNull int edad, @NotNull int dni) {
        this.name = name;
        this.edad = edad;
        this.dni = dni;
    }

    public Long getId_user() {
        return id_user;
    }

    public String getName() {
        return name;
    }

    public int getEdad() {
        return edad;
    }

    public int getDni() {
        return dni;
    }

    public void setId_user(Long id_user) {
        this.id_user = id_user;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public void setDni(int dni) {
        this.dni = dni;
    }
}
