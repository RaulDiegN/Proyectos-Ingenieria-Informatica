package com.example.empleado.entity.models;


import javax.persistence.*;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.NotNull;

@Entity
@Table(name = "empleado")
public class Empleado {

    private static final long serialVarsionUID = 1L;

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id_empleado;
    @NotNull
    private int empresa_id;
    @NotNull
    private int dni_user;
    @NotEmpty
    private String puesto;


    public Empleado() {
        super();
    }

    public Empleado(@NotNull int empresa_id, @NotNull int dni_user, @NotEmpty String puesto) {
        this.empresa_id = empresa_id;
        this.dni_user = dni_user;
        this.puesto = puesto;
    }

    public long getId_empleado() {
        return id_empleado;
    }

    public void setId_empleado(long id_empleado) {
        this.id_empleado = id_empleado;
    }

    public int getEmpresa_id() {
        return empresa_id;
    }

    public void setEmpresa_id(int empresa_id) {
        this.empresa_id = empresa_id;
    }

    public int getDni_user() {
        return dni_user;
    }

    public void setDni_user(int dni_user) {
        this.dni_user = dni_user;
    }

    public String getPuesto() {
        return puesto;
    }

    public void setPuesto(String puesto) {
        this.puesto = puesto;
    }

}
