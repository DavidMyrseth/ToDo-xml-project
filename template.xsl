<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <title>TODO List</title>
            </head>
            <body>
                <h2>TODO List (XML + XSLT)</h2>
                <table border="1" cellpadding="6">
                    <tr>
                        <th>ID</th>
                        <th>Kuupäev</th>
                        <th>Tähtaeg</th>
                        <th>Õppeaine</th>
                        <th>Tüüp</th>
                        <th>Info</th>
                        <th>Kommentaar</th>
                    </tr>

                    <xsl:for-each select="tasks/task">
                        <tr>
                            <td><xsl:value-of select="@id"/></td>
                            <td><xsl:value-of select="dim1/date"/></td>
                            <td><xsl:value-of select="dim1/deadline"/></td>

                            <td><xsl:value-of select="dim2/subject"/></td>
                            <td><xsl:value-of select="dim2/type"/></td>

                            <td><xsl:value-of select="dim3/info"/></td>
                            <td><xsl:value-of select="dim3/comment"/></td>
                        </tr>
                    </xsl:for-each>

                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
