package com.example.usuario.controller;


import com.example.usuario.entity.models.Usuario;
import com.example.usuario.entity.services.IUsuarioService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Optional;

@RestController
public class UsuarioController {

    @Autowired
    IUsuarioService usuarioService;

    @GetMapping("/usuarios/{id_user}")
    public Optional<Usuario> getOne(@PathVariable(value = "id_user") long id_user){
        return usuarioService.get(id_user);
    }

    @GetMapping("/usuarios")
    public List<Usuario> getAllUsuarios(){
        return usuarioService.getAll();
    }

    @PostMapping(value = "/usuario")
    public void add(@RequestBody Usuario usuario){
        usuarioService.post(usuario);
    }

    @PutMapping("/usuarios/{id_user}")
    public void update(@RequestBody Usuario usuario, @PathVariable(value = "id_user") long id_user){
        usuarioService.put(usuario, id_user);
    }

    @DeleteMapping("/usuarios/{id_user}")
    public void delete(@PathVariable(value = "id_user") long id_user){
        usuarioService.delete(id_user);
    }
}
