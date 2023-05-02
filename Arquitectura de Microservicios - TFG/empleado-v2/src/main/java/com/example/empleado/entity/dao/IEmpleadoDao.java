package com.example.empleado.entity.dao;

import com.example.empleado.entity.models.Empleado;
import org.springframework.data.repository.CrudRepository;

public interface IEmpleadoDao extends CrudRepository<Empleado, Long> {
}
