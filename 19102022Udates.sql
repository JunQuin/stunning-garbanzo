CREATE TABLE `inei_fojemv2`.`jueces` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `apellido` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `celular` VARCHAR(15) NOT NULL,
    `status` TINYINT NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE (`email`),
    UNIQUE (`celular`)
) ENGINE = InnoDB;

CREATE TABLE `admin_users` (
    `id` int(11) NOT NULL,
    `nombre` varchar(150) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
    `celular` varchar(15) NOT NULL,
    `rol` tinyint(4) NOT NULL,
    `remember_token` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Indices de la tabla `admin_users`
--
ALTER TABLE
    `admin_users`
ADD
    PRIMARY KEY (`id`),
ADD
    UNIQUE KEY `correo` (`email`, `celular`);

-- AUTO_INCREMENT de la tabla `admin_users`
--
ALTER TABLE
    `admin_users`
MODIFY
    `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

COMMIT;

-- AQUI VIENE LA VISTA--------------------
CREATE VEW dashboarddataview AS
SELECT
    `inei_fojemv2`.`users`.`id` AS `pro_id`,
    `inei_fojemv2`.`users`.`name` AS `pro_nombre`,
    `inei_fojemv2`.`users`.`descripcion` AS `pro_descripcion`,
    `inei_fojemv2`.`users`.`asesorNombre` AS `asesorNombre`,
    `inei_fojemv2`.`users`.`asesorCelular` AS `asesorCelular`,
    `inei_fojemv2`.`users`.`asesorEmail` AS `asesorEmail`,
    `inei_fojemv2`.`users`.`participado` AS `pro_participado`,
    `inei_fojemv2`.`categorias`.`nombre` AS `pro_categoria`,
    `inei_fojemv2`.`sub_categorias`.`nombre` AS `pro_subcategoria`,
    `inei_fojemv2`.`users`.`participante1_Nombre` AS `par1_nombre`,
    `inei_fojemv2`.`users`.`participante1_Apellidos` AS `par1_apellidos`,
    `inei_fojemv2`.`users`.`participante1_Telefono` AS `par1_telefono`,
    `inei_fojemv2`.`users`.`participante1_Correo` AS `par1_correo`,
    `inei_fojemv2`.`users`.`participante1_InstitucionProcedencia` AS `par1_procedencia`,
    `inei_fojemv2`.`users`.`participante1_NivelEducativo` AS `par1_niveleducativo`,
    `inei_fojemv2`.`users`.`participante2_Nombre` AS `par2_nombre`,
    `inei_fojemv2`.`users`.`participante2_Apellidos` AS `par2_apellidos`,
    `inei_fojemv2`.`users`.`participante2_Telefono` AS `par2_telefono`,
    `inei_fojemv2`.`users`.`participante2_Correo` AS `par2_correo`,
    `inei_fojemv2`.`users`.`participante2_InstitucionProcedencia` AS `par2_procedencia`,
    `inei_fojemv2`.`users`.`participante2_NivelEducativo` AS `par2_niveleducativo`,
    `inei_fojemv2`.`users`.`status` AS `status`,
    `inei_fojemv2`.`users`.`document` AS `documento`,
    `inei_fojemv2`.`users`.`link` AS `video`,
    `inei_fojemv2`.`users`.`payment` AS `recibo`,
    `inei_fojemv2`.`users`.`bitacoras` AS `bitacora`
from
    `inei_fojemv2`.`users`
    join `inei_fojemv2`.`categorias` on `inei_fojemv2`.`users`.`categoria` = `inei_fojemv2`.`categorias`.`id`
    join `inei_fojemv2`.`sub_categorias` on `inei_fojemv2`.`users`.`subcategoria` = `inei_fojemv2`.`sub_categorias`.`id`
